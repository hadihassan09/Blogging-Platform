<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class UserPosts extends Component
{
    public $posts;
    public $type;
    protected $listeners = ['refreshPosts'];

    public function refreshPosts()
    {
        if($this->type == 'all')
            $this->posts = Post::latest()->get();
        else if($this->type == 'user')
            $this->posts = Post::latest()->get();
    }

    public function mount()
    {
        if($this->type == 'all')
            $this->posts = Post::latest()->get();
        else if($this->type == 'user')
            $this->posts = Post::latest()->get();

    }

    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        $this->posts = $this->posts->except($postId);
    }

    public function render()
    {
        $this->refreshPosts();
        return view('livewire.user-posts', ['posts' => $this->posts]);
    }
}