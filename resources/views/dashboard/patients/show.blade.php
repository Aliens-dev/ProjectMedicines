@extends('layouts.app')
@section('title', 'Afficher un patient')
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
                            <h6 class="card-subtitle mb-3 text-muted"><strong>N° carte :</strong> {{ $patient->national_id }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>N° Téléphone :</strong> {{ $patient->national_id }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>Adresse :</strong> {{ $patient->address }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>Wilaya :</strong> {{ $patient->state_of_residence }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>Ville :</strong> {{ $patient->city_of_residence }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>Date Naissance :</strong> {{ $patient->birthday }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>Age :</strong> {{ $patient->age }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>Premiere Injection :</strong> {{ $patient->first_injection_date }}</h6>
                            <h6 class="card-subtitle mb-3 text-muted"><strong>Rendez Vous :</strong> {{ $patient->next_appointment }}</h6>
                            @if($patient->second_injection == 1)
                                <h6 class="card-subtitle mb-3 text-muted"><strong>La deuxieme injection est fait</strong></h6>
                            @else
                                <h6 class="card-subtitle mb-3 text-muted"><strong>La deuxieme Injection n'est fait</strong></h6>
                                {!! Form::open(['method'=>'POST', 'url' =>route('patients.injection', $patient->id),'style' => 'display:block']) !!}
                                    {!! Form::button('Ajouter la deuxieme injection', array('type' => 'submit','class' => 'btn btn-primary w-100','title' => 'Delete Post','onclick'=>'return confirm("Ajouter deuxieme injection?")')) !!}
                                {!! Form::close() !!}
                            @endif
                            @if(count($patient->deseases))
                                <div class="card-text mt-2">
                                    <strong>les Maladie:</strong>
                                    <ul>
                                        @foreach($patient->deseases as $desease)
                                            <li> {{ $desease->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-success w-100 mb-2 mt-2">Modifier</a>
                            {!! Form::open(['method'=>'DELETE', 'url' =>route('patients.destroy', $patient->id),'style' => 'display:block']) !!}

                                {!! Form::button('Supprimmer', array('type' => 'submit','class' => 'btn btn-danger w-100','title' => 'Delete Post','onclick'=>'return confirm("Confirm delete?")')) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
