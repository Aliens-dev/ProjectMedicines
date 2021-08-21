@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="deseases">
                    @if(count($deseases) > 0)
                        @foreach($deseases as $desease)
                            <div class="well">
                                <h3><a href="/deseases/{{$desease->id}}">{{$desease->name}}</a></h3>
                                <small>description : {{$desease->description}}</small>
                            </div>
                        @endforeach
                    @else
                        <p>no deseases found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
 