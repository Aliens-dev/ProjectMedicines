@extends('layouts.app')

@section('content')

    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="d-flex justify-content-center m-5">
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                            <h3 class="card-title mb-4">{{ $patient->first_name }} {{ $patient->last_name }}</h3>
                            <h6 class="card-subtitle mb-3 text-muted">N° carte : {{ $patient->national_id }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">N° Téléphone : {{ $patient->national_id }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">Adresse : {{ $patient->address }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">Wilaya : {{ $patient->state_of_residence }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">Ville : {{ $patient->city_of_residence }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">Date Naissance : {{ $patient->birthday }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">Age : {{ $patient->age }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">Premiere Injection : {{ $patient->first_injection_date }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted">Rendez Vous : {{ $patient->next_appointment }}</h6>
                            @if(count($patient->deseases))
                                <div class="card-text">
                                    les Maladie:
                                    <ul>
                                        @foreach($patient->deseases as $desease)
                                            <li> {{ $desease->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-success">Modifier</a>
                            <button  class="btn btn-danger">Supprimmer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
