<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Comment;

class UserComments extends Component
{
    public $comments;
    public $post_id;
    public $newComment;
    public $type;

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:255']);
        $createdComment = Comment::create([
            'text' => $this->newComment,
            'user_id' => Auth::id(),
            'post_id' => $this->post_id
        ]);
        if($this->type == 'all'){
            $this->comments->forget(2);
            $this->comments->prepend($createdComment);
        }
        else if($this->type == 'user')
            $this->comments->prepend($createdComment);
        $this->newComment = "";
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        $this->comments = $this->comments->except($commentId);
    }

    public function render()
    {
        if($this->type == 'all')
            $this->comments = Comment::where('post_id', $this->post_id)->latest()->limit(3)->get();
        else if($this->type == 'user')
            $this->comments = Comment::where('post_id', $this->post_id)->latest()->get();

        return view('livewire.user-comments', ['comments' => $this->comments]);
    }
}
