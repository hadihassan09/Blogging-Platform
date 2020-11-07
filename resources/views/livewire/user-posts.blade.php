<div wire:poll.5s>
    @foreach($posts as $post)
        <div style="margin-top: 10px">
            <div class="post">
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <h1>{{ $post->title }}</h1>
                        <p class="mx-3 py-1 text-xs text-gray-500 font-semibold"
                           style="margin: 17px 0 16px 40px">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    @if(Auth::id() == $post->user_id)
                        <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="delete({{$post->id}})"></i>
                    @endif
                </div>
                <img src="{{ asset('image/banner.jpg') }}" style="height:200px;"/>
                <p class="text-gray-800">{{ $post->text }}</p>
                @livewire('user-comments', [
                    'post_id' => $post->id,
                    'type' => 'all'
                    ],
                    key($post->id)
                )
            </div>
        </div>
    @endforeach
    <div style="margin: 0 0 10px 0">
        {{ $posts->links() }}
    </div>
</div>
