@section('header')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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

                    <h1 style="margin-top: 10px; text-decoration: underline;">Post Creation Form:</h1>

{{--                    @if(Session::has('success'))--}}
{{--                        <div class="alert alert-success">--}}
{{--                            {{ Session::get('success') }}--}}
{{--                            @php--}}
{{--                                Session::forget('success');--}}
{{--                            @endphp--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    <form method="POST" action="{{ route('createPost') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label">Description:</label>
                            <textarea name="text" class="form-control @error('text') is-invalid @enderror" placeholder="Description">{{ old('text') }}</textarea>
                            @if ($errors->has('text'))
                                <span class="text-danger">{{ $errors->first('text') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Type:</label>
                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" placeholder="Type">
                            @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Public:</label>
                            <br>
                            <input type="radio" id="yes" name="public" value="1" checked>
                            <label for="yes">Yes</label>
                            <input type="radio" id="no" name="public" value="0">
                            <label for="no">No</label>
                            <br>
                            @if ($errors->has('public'))
                                <span class="text-danger>{{ $errors->first('public') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
