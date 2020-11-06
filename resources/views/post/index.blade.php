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
                    @livewire('user-posts', [
                        'type' => 'all'
                    ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
