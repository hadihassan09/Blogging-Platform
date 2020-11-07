<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class UserPosts extends Component
{
    use WithPagination;

    public $type;


    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();
//        $this->posts = $this->posts->except($postId);
    }


    public function render()
    {
        if($this->type == 'all')
            $posts = Post::latest()->paginate(5);
        else if($this->type == 'user')
            $posts = Post::where('user_id',Auth::id())->latest()->paginate(5);
        return view('livewire.user-posts', ['posts' => $posts]);
    }
}
