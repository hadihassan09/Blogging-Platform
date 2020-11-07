<div wire:poll.5s>
    @if($type != 'single')
        @foreach($posts as $post)
            <div style="margin-top: 10px">
                <div class="post">
                    <div class="flex justify-between my-2">
                        <div class="flex">
                            <h1><a style="color: black"
                                   href="{{ route('showPost', ['post' => $post->id]) }}">{{ $post->title }}</a></h1>
                            <p class="mx-3 py-1 text-xs text-gray-500 font-semibold"
                               style="margin: 17px 0 16px 40px">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        @if(Auth::id() == $post->user_id)
                            <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="delete({{$post->id}})"></i>
                        @endif
                    </div>
                    <img src="{{ asset('image/banner.jpg') }}" style="height:200px;"/>
                    <p class="text-gray-800">{{ $post->text }}</p>
                    <div class="likes" data-id="{{ $post->id }}">
                        <span class="like-btn">
                            <i id="like{{$post->id}}" class="fa fa-thumbs-up {{ Auth::user()->hasLiked($post) ? 'like-post' : '' }}"></i>
                            <div id="like{{$post->id}}-bs3">
                                {{ $post->likesCounter() }}
                            </div>
                        </span>
                    </div>
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
    @else
        <div style="margin: 20px 0 20px 0">
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
                <div class="likes" data-id="{{ $post->id }}">
                        <span class="like-btn">
                            <i id="like{{$post->id}}" class="fa fa-thumbs-up {{ Auth::user()->hasLiked($post) ? 'like-post' : '' }}"></i>
                            <div id="like{{$post->id}}-bs3">
                                {{ $post->likesCounter() }}
                            </div>
                        </span>
                </div>
                @livewire('user-comments', [
                    'post_id' => $post->id,
                    'type' => 'all'
                    ],
                    key($post->id)
                )
            </div>
        </div>
    @endif
</div>

<script type="text/javascript">
    $(document).ready(function() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('i.fa-thumbs-up, i.fa-thumbs-down').click(function(){
            var id = $(this).parents(".likes").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $(this);


            $.ajax({
                type:'POST',
                url:'/post/like',
                data:{post_id:id},
                success:function(data){
                    if(data.success == 'unliked'){
                        $('#'+cObjId+'-bs3').html(parseInt(c)-1 );
                        $(cObj).removeClass("like-post");
                    }else{
                        $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                        $(cObj).addClass("like-post");
                    }
                }
            });


        });


        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    });
</script>
