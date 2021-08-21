@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="deseases">
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            <div class="well">
                                <h3><a href="/users/{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</a></h3>
                                <small>email : {{$user->email}}</small>
                            </div>
                        @endforeach
                        {{$users->links()}}
                    @else
                        <p>no user found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
 