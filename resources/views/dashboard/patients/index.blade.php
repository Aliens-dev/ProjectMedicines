@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="row mt-2 ml-3 mr-3">
                            <div class="alert alert-success alert-dismissible fade show col" role="alert">
                                {{ \Illuminate\Support\Facades\Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="row mt-5 m-2">
                        <div class="col-xl-8 col-md-6">
                            <a href="{{ route('patients.create') }}" class="btn btn-primary">Ajouter un patient</a>
                        </div>
                        <form action="{{route('patients.search')}}" class="form-inline col-xl-4 col-md-6">
                            <div class="mb-2 form-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="Rechercher un N° ID">
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
                                                    <a href="{{ route('patients.edit', $patient->id) }}" class="text-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('patients.show', $patient->id) }}" class="text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                          </svg>
                                                    </a>
                                                    {!! Form::open(['method'=>'DELETE', 'url' =>route('patients.destroy', $patient->id),'style' => 'display:inline']) !!}

                                                        {!! Form::button('<i class="ft-trash"></i>delete', array('type' => 'submit','class' => 'btn btn-danger','title' => 'Delete Post','onclick'=>'return confirm("Confirm delete?")')) !!}

                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $patients->links() }}
                                </div>
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
