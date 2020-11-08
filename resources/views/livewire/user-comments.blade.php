<div >
    <div class="w-6/1" wire:poll.7s>
        @foreach($comments as $comment)
            <div
                class="forum-comment tw-rounded-xl tw-bg-black-transparent-1 tw-border tw-border-solid tw-border-black-transparent-3 tw-mb-2 is-reply"
                id="reply-662400" data-index="2">
                <div class="tw-flex tw-px-6 tw-py-4 lg:tw-p-5">
                    <div class="tw-hidden md:tw-block tw-mr-5 tw-text-left">
{{--                        <a href="/@hadihassan09" class="tw-block tw-relative tw-rounded-lg tw-overflow-hidden tw-mb-3">--}}
                        <img class="is-circle tw-bg-white tw-w-8 md:tw-w-18 lazyloaded"
                             src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" style="border-radius: 9px;">
{{--                        </a>--}}

                    </div>
                    <div class="tw-flex-1 tw-relative">
                        <header class="tw-flex tw-mb-5 tw-justify-between">
                            <div class="tw-flex-1 tw-leading-none tw-text-left">
                                <div class="tw-flex tw-items-center">
                                    <p  class="tw-font-bold tw-block tw-font-lg tw-mr-2 tw-text-black">{{$comment->getCreaterName()}}</p>
                                </div>
                                <p class="tw-font-semibold tw-pt-1 md:tw-pt-0 tw-text-3xs tw-text-grey-dark"><span
                                        class="tw-text-grey-dark">Posted {{$comment->created_at->diffForHumans()}}</span></p></div>
                            @if(Auth::id() == $comment->user_id)
                                <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="remove({{$comment->id}})"></i>
                            @endif
                        </header>
                        <div class="content user-content tw-text-black md:tw-text-sm">
                            <p>
                                {{$comment->text}}
                            </p>
                        </div>
                        <div
                            class="forum-comment-edit-links tw-flex tw-justify-end lg:tw-justify-start tw-relative tw-mt-4 tw--mb-1 md:tw-leading-none tw-justify-start"
                            style="height: 34px;">
                            <button
                                class="tw-transition-all tw-border tw-border-solid tw-border-black-transparent-3 hover:tw-border-black-transparent-10 tw-bg-black-transparent-2 hover:tw-bg-black-transparent-3 tw-font-semibold tw-inline-flex tw-items-center tw-px-3 md:tw-text-xs mobile:tw-text-sm mobile:tw-p-2 mobile:tw-flex mobile:tw-items-center reply-likes mobile:tw-text-sm tw-mr-2 has-none tw-border-black-transparent-3 tw-bg-black-transparent-1"
                                style="border-radius: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 14 13"
                                     class="tw-fill-current tw-cursor-pointer tw-text-grey">
                                    <path fill-rule="nonzero"
                                          d="M13.59 1.778c-.453-.864-3.295-3.755-6.59.431C3.54-1.977.862.914.41 1.778c-.825 1.596-.33 4.014.823 5.18L7.001 13l5.767-6.043c1.152-1.165 1.647-3.582.823-5.18z">
                                        <title>Like this reply.</title></path>
                                </svg> <!----></button>
{{--                            <div class="dropdown tw-relative show-on-hover lg:tw-ml-auto">--}}
{{--                                <div aria-haspopup="true" class="dropdown-toggle tw-h-full" aria-expanded="true">--}}
{{--                                    <button--}}
{{--                                        class="tw-transition-all tw-border tw-border-solid tw-border-black-transparent-3 hover:tw-border-black-transparent-10 tw-bg-black-transparent-2 hover:tw-bg-black-transparent-3 tw-font-semibold tw-inline-flex tw-items-center tw-px-3 md:tw-text-xs mobile:tw-text-sm mobile:tw-p-2 mobile:tw-flex mobile:tw-items-center tw-h-full tw-text-black-transparent-50 tw-font-bold hover:tw-text-blue tw-text-sm"--}}
{{--                                        style="border-radius: 12px;">--}}
{{--                                        <span class="tw-relative" style="top: -3px;">...</span>--}}
{{--                                    </button>--}}
{{--                                    <div--}}
{{--                                        class="dropdown-menu tw-absolute tw-z-10 tw-py-2 tw-rounded-lg tw-shadow tw-mt-2 tw-right-0 is-light"--}}
{{--                                        style="width: 200px">--}}
{{--                                        <li class="dropdown-menu-link"><a href="#">Edit</a></li>--}}
{{--                                        <li class="dropdown-menu-link"><a href="#">Delete</a></li>--}}
{{--                                        <li class="dropdown-menu-link"><!----></li>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            <form class="flex" wire:submit.prevent="addComment">
                <input type="hidden" value="{{ $post_id }}" wire:model="post_id">
                <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Add a comment" wire:model.debounce.500ms="newComment">
                <div class="py-2">
                    <button type="submit" class="p-2 btn btn-dark">Add</button>
                </div>
            </form>
    </div>
</div>
