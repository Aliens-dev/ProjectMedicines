@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content d-flex flex-grow-1">
                @include('partials.navbar')
                @yield("content")
            </div>
        </div>
    </div>
@endsection
