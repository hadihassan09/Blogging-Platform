<div >
    <div class="w-6/12" wire:poll.7s>
        @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <form class="flex" wire:submit.prevent="addComment">
            <input type="hidden" value="{{ $post_id }}" wire:model="post_id">
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Add a comment" wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button type="submit" class="p-2 btn btn-dark">Add</button>
            </div>
        </form>
        @foreach($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <p class="font-bold text-lg">{{$comment->getCreaterName()}}</p>
                        <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                    @if(Auth::id() == $comment->user_id)
                        <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="remove({{$comment->id}})"></i>
                    @endif
                </div>
                <p class="text-gray-800">{{$comment->text}}</p>
            </div>
        @endforeach
    </div>
</div>
