@extends('layouts.app')
@section('title', "modifier l'utilisateur")
@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    <div class="row mt-5 mb-5 mr-5 ml-5">
                        <div class="col">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}">
                                    </div>
                                    <label for="first_name" class="col-sm-2 col-form-label">Prenom</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="mt-4 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-success mr-1" value="Modifier">
                                    <input type="reset" class="btn btn-info" value="Réinitialiser">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
