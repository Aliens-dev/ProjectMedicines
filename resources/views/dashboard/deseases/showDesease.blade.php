@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="desease">
                    <h1>{{$desease->name}}</h1>
                    <small>description : {{$desease->description}}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
 