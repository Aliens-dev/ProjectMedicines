@extends('layouts.app')

@section('content')

    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="d-flex justify-content-center m-5">
                    <div class="card p-5">
                        <img src="/assets/img/man.svg" class="card-img-top" alt="{{ $user->first_name }}">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success mt-2">Modifier</a>
                            <a href="#" class="btn btn-danger mt-2">Supprimmer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
