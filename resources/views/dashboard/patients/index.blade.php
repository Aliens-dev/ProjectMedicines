@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    <div class="row mt-5 m-2">
                        <div class="col-xl-8 col-md-6">
                            <a href="{{ route('patients.create') }}" class="btn btn-primary">Ajouter un patient</a>
                        </div>
                        <form class="form-inline col-xl-4 col-md-6">
                            <div class="mb-2 form-group">
                                <input type="text" class="form-control" id="search" placeholder="Rechercher un N° ID">
                            </div>
                            <button class="btn btn-info mb-2 ml-1">Rechercher</button>
                        </form>
                    </div>
                    <div class="row mt-2 mb-5 mr-2 ml-2">
                        <div class="col">
                            @if(count($patients))
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Naissance</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Wilaya</th>
                                        <th scope="col">Ville</th>
                                        <th scope="col">N Carte</th>
                                        <th scope="col">Téléphone</th>
                                        <th scope="col">Date Injection</th>
                                        <th scope="col">Rendez Vous</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->last_name }}</td>
                                                <td>{{ $patient->first_name }}</td>
                                                <td>{{ $patient->birthday }}</td>
                                                <td>{{ $patient->age }}</td>
                                                <td>{{ $patient->state_of_residence }}</td>
                                                <td>{{ $patient->city_of_residence }}</td>
                                                <td>{{ $patient->national_id }}</td>
                                                <td>{{ $patient->phone }}</td>
                                                <td>{{ $patient->first_injection_date }}</td>
                                                <td>{{ $patient->next_appointment }}</td>
                                                <td>
                                                    <button class="btn btn-danger">Supprimmer</button>
                                                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-success">Modifier</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                Pas de patients, Veuillez ajouter un
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
