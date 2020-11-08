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
                        {{--                        <span class="like-btn">--}}
                        {{--                            <i id="like{{$post->id}}" class="fa fa-thumbs-up {{ Auth::user()->hasLiked($post) ? 'like-post' : '' }}"></i>--}}

                        {{--                        </span>--}}
                        <br>
                        <button
                            id="like{{$post->id}}"
                            class="tw-transition-all tw-border tw-border-solid tw-border-black-transparent-3 hover:tw-border-black-transparent-10
                         tw-bg-black-transparent-2 hover:tw-bg-black-transparent-3 tw-font-semibold tw-inline-flex tw-items-center tw-px-3
                          md:tw-text-xs mobile:tw-text-sm mobile:tw-p-2 mobile:tw-flex mobile:tw-items-center reply-likes mobile:tw-text-sm
                           tw-mr-2 has-none tw-border-black-transparent-3 tw-bg-black-transparent-1 tw-py-2 "

                            style="border-radius: 12px; outline: none">
                            <svg id="like{{$post->id}}-color" xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 14 13"
                                 class="tw-fill-current tw-cursor-pointer {{ Auth::user()->hasLiked($post) ? 'tw-text-blue' : 'tw-text-grey' }} ">
                                <path fill-rule="nonzero"
                                      d="M13.59 1.778c-.453-.864-3.295-3.755-6.59.431C3.54-1.977.862.914.41 1.778c-.825 1.596-.33 4.014.823 5.18L7.001 13l5.767-6.043c1.152-1.165 1.647-3.582.823-5.18z">
                                    <title>Like this reply.</title>
                                </path>
                            </svg>
                            <span id="like{{$post->id}}-bs3" title="Liked by {{ $post->getLikersNames() }}" class="tw-text-xs tw-font-semibold tw-text-blue" style="margin-left: 6px; cursor: help;">{{ $post->likesCounter() }}</span>
                        </button>
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
{{--                        <span class="like-btn">--}}
{{--                            <i id="like{{$post->id}}" class="fa fa-thumbs-up {{ Auth::user()->hasLiked($post) ? 'like-post' : '' }}"></i>--}}

{{--                        </span>--}}
                    <br>
                    <button
                        id="like{{$post->id}}"
                        class="tw-transition-all tw-border tw-border-solid tw-border-black-transparent-3 hover:tw-border-black-transparent-10
                         tw-bg-black-transparent-2 hover:tw-bg-black-transparent-3 tw-font-semibold tw-inline-flex tw-items-center tw-px-3
                          md:tw-text-xs mobile:tw-text-sm mobile:tw-p-2 mobile:tw-flex mobile:tw-items-center reply-likes mobile:tw-text-sm
                           tw-mr-2 has-none tw-border-black-transparent-3 tw-bg-black-transparent-1 tw-py-2 "

                        style="border-radius: 12px; outline: none">
                        <svg id="like{{$post->id}}-color" xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 14 13"
                             class="tw-fill-current tw-cursor-pointer {{ Auth::user()->hasLiked($post) ? 'tw-text-blue' : 'tw-text-grey' }} ">
                            <path fill-rule="nonzero"
                                  d="M13.59 1.778c-.453-.864-3.295-3.755-6.59.431C3.54-1.977.862.914.41 1.778c-.825 1.596-.33 4.014.823 5.18L7.001 13l5.767-6.043c1.152-1.165 1.647-3.582.823-5.18z">
                                <title>Like this reply.</title>
                            </path>
                        </svg>
                        <span id="like{{$post->id}}-bs3" title="Liked by {{ $post->getLikersNames() }}" class="tw-text-xs tw-font-semibold tw-text-blue" style="margin-left: 6px; cursor: help;">{{ $post->likesCounter() }}</span>
                    </button>
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


        $('button.reply-likes, i.fa-thumbs-down').click(function(){
            var id = $(this).parents(".likes").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $('#'+this.id+'-color');


            $.ajax({
                type:'POST',
                url:'/post/like',
                data:{post_id:id},
                success:function(data){
                    if(data.success == 'unliked'){
                        $('#'+cObjId+'-bs3').html(parseInt(c)-1 );
                        $(cObj).removeClass('tw-text-blue');
                        $(cObj).addClass("tw-text-grey");
                    }else{
                        $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                        $(cObj).removeClass("tw-text-grey");
                        $(cObj).addClass('tw-text-blue');
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
