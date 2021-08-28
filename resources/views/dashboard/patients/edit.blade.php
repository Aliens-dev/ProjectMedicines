@extends('layouts.app')
@section('title', 'modifier un patient')
@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    <div class="row mt-5 mb-5 mr-5 ml-5">
                        <div class="col">
                            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $patient->last_name }}">
                                    </div>
                                    <label for="first_name" class="col-sm-2 col-form-label">Prenom</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $patient->first_name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthday" class="col-sm-2 col-form-label">Date de naissance</label>
                                    <div class="col">
                                        <input type="date" class="form-control" name="birthday" value="{{ $patient->birthday }}" id="birthday" />
                                    </div>
                                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                                    <div class="col">
                                        <input type="number" min="1" max="120" name="age" value="{{ $patient->age }}" class="form-control" id="age" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="state_of_residence" class="col-sm-2 col-form-label">Wilaya</label>
                                    <div class="col">
                                        <select class="form-control" name="state_of_residence" id="state_of_residence"></select>
                                    </div>
                                    <label for="city_of_residence" class="col-sm-2 col-form-label">Ville</label>
                                    <div class="col">
                                        <select class="form-control" name="city_of_residence" id="city_of_residence"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Adresse</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $patient->address }}"  name="address" id="address" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="national_id" class="col-sm-2 col-form-label">N° Carte Identité</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $patient->national_id }}"  name="national_id" id="national_id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">N° Téléphone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $patient->phone }}" name="phone" id="phone" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="first_injection_date" class="col-sm-2 col-form-label">Date D'injection</label>
                                    <div class="col">
                                        <input type="date" class="form-control" value="{{ $patient->first_injection_date }}"  name="first_injection_date" id="first_injection_date" />
                                    </div>
                                    <label for="next_appointment" class="col-sm-2 col-form-label">Prochain rendez-vous</label>
                                    <div class="col">
                                        <input type="date" class="form-control" value="{{ $patient->next_appointment }}" name="next_appointment" id="next_appointment" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="first_injection_date" class="col-sm-2 col-form-label">Les maladies ?</label>
                                    <div class="col">
                                        <select name="deseases[]" class="form-select col" multiple aria-label="multiple select">
                                            @foreach($deseases as $desease)
                                                <option {{ in_array($desease->id,$patient->deseases->pluck('id')->toArray()) ? 'selected' :'' }}
                                                        value="{{ $desease->id }}"
                                                >
                                                    {{ $desease->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary mr-1" value="Modifier">
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
