@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    <div class="row mt-5 mb-5 mr-5 ml-5">
                        <div class="col">
                            <form action="{{ route('patients.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col d-flex flex-column">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label for="first_name" class="col-sm-2 col-form-label">Prenom</label>
                                    <div class="col d-flex flex-column">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                        @error('last_name')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthday" class="col-sm-2 col-form-label">Date de naissance</label>
                                    <div class="col d-flex flex-column">
                                        <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" id="birthday" />
                                        @error('birthday')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                                    <div class="col d-flex flex-column">
                                        <input type="number" min="1" max="120" name="age" value="{{ old('age') }}" class="form-control" id="age" />
                                        @error('age')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="state_of_residence" class="col-sm-2 col-form-label">Wilaya</label>
                                    <div class="col d-flex flex-column" >
                                        <select class="form-control" id="state_of_residence" name="state_of_residence"></select>
                                        @error('state_of_residence')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label for="city_of_residence" class="col-sm-2 col-form-label">Ville</label>
                                    <div class="col d-flex flex-column">
                                        <select class="form-control" id="city_of_residence" name="city_of_residence"></select>
                                        @error('city_of_residence')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Adresse</label>
                                    <div class="col d-flex flex-column">
                                        <input type="text" class="form-control" value="{{ old('address') }}"  name="address" id="address" />
                                        @error('address')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="national_id" class="col-sm-2 col-form-label">N° Carte Identité</label>
                                    <div class="col d-flex flex-column">
                                        <input type="text" class="form-control" value="{{ old('national_id') }}"  name="national_id" id="national_id">
                                        @error('national_id')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">N° Téléphone</label>
                                    <div class="col d-flex flex-column">
                                        <input type="text" class="form-control" value="{{ old('phone') }}"  name="phone" id="phone" />
                                    </div>
                                    @error('phone')
                                        <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="first_injection_date" class="col-sm-2 col-form-label">Date D'injection</label>
                                    <div class="col d-flex flex-column">
                                        <input type="date" class="form-control" value="{{ old('first_injection_date') }}"  name="first_injection_date" id="first_injection_date" />
                                        @error('first_injection_date')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label for="next_appointment" class="col-sm-2 col-form-label">Prochain rendez-vous</label>
                                    <div class="col d-flex flex-column">
                                        <input type="date" class="form-control" value="{{ old('next_appointment') }}" name="next_appointment" id="next_appointment" />
                                        @error('next_appointment')
                                        <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="first_injection_date" class="col-sm-2 col-form-label">Les maladies ?</label>
                                    <div class="col d-flex flex-column">
                                        <select name="deseases[]" class="form-select col" multiple aria-label="multiple select">
                                            @foreach($deseases as $desease)
                                                <option value="{{ $desease->id }}">{{ $desease->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('deseases')
                                            <span class="alert alert-danger mt-1 pt-1 pb-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
