<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class UserPosts extends Component
{
    use WithPagination;

    public $type;
    public $post;


    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        if($this->type == 'single'){
            return redirect('/post/');
        }
    }

    public function render()
    {
        if($this->type == 'all')
            return view('livewire.user-posts', [
                'posts' => Post::latest()->paginate(5),
                'type' => $this->type
            ]);
        else if($this->type == 'user')
            return view('livewire.user-posts', [
                'posts' => Post::where('user_id', Auth::id())->latest()->paginate(5),
                'type' => $this->type
            ]);
        else if($this->type == 'single')
            return  view('livewire.user-posts', [
                'type' => $this->type
            ]);
    }
}
