@section('header')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .post{
            padding: 20px;
            margin-top: 20px;
        }
        .post > h1{
            font-size: 36px;
            font-family: normal;
            text-align: left;
        }
        .post > p {
            font-size: 16px;
            text-align: justify;
            font-family: medium;
            color: #333;
            margin: 5px 0 0px;
        }
    </style>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">

                    @forelse ($posts as $post)
                        <div style="margin-top: 10px">
                            <div class="post">
                                <h1>
                                    {{ $post->title }}
                                </h1>
                                <img src="{{ asset('image/banner.jpg') }}" style="height:200px;"/>
                                <p>{{ $post->text }}</p>
                                @livewire('user-comments', [
                                    'post_id' => $post->id
                                ])
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
