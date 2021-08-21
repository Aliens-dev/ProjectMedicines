@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    Patient Content...
                </div>
            </div>
        </div>
    </div>
@endsection
