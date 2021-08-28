@extends('layouts.app')

@section('title', 'creer un utilisateur')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    <div class="row mt-5 mb-5 mr-5 ml-5">
                        <div class="col">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                    </div>
                                    <label for="first_name" class="col-sm-2 col-form-label">Prenom</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">mot de passe</label>
                                    <div class="col">
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">confirmation mot de passe</label>
                                    <div class="col">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                                <div class="mt-4 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary mr-1" value="Ajouter">
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
