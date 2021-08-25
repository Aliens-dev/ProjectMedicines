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
                            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                                <strong>{{ \Illuminate\Support\Facades\Session::get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                    <div class="limiter container">
                        <div class="container-table100">
                            <div class="wrap-table100">
                               
                                    @if(count($patients))
                                        <table class="table">
                                            <thead class="header thead-dark">
                                                <tr class="header">
                                                    <th scope="col" class="cell">Nom</th>
                                                    <th scope="col" class="cell">Prenom</th>
                                                    <th scope="col" class="cell">Naissance</th>
                                                    <th scope="col" class="cell">Age</th>
                                                    <th scope="col" class="cell">Wilaya</th>
                                                    <th scope="col" class="cell">Ville</th>
                                                    <th scope="col" class="cell">N Carte</th>
                                                    <th scope="col" class="cell">Téléphone</th>
                                                    <th scope="col" class="cell">Date Injection</th>
                                                    <th scope="col" class="cell">Rendez Vous</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($patients as $patient)
                                                    <tr>
                                                        <td class="cell">{{ $patient->last_name }}</td>
                                                        <td class="cell">{{ $patient->first_name }}</td>
                                                        <td class="cell">{{ $patient->birthday }}</td>
                                                        <td class="cell">{{ $patient->age }}</td>
                                                        <td class="cell">{{ $patient->state_of_residence }}</td>
                                                        <td class="cell">{{ $patient->city_of_residence }}</td>
                                                        <td class="cell">{{ $patient->national_id }}</td>
                                                        <td class="cell">{{ $patient->phone }}</td>
                                                        <td class="cell">{{ $patient->first_injection_date }}</td>
                                                        <td class="cell">{{ $patient->next_appointment }}</td>
                                                        <td class="d-flex justify-content-center align-items-center cell">
                                                            <a href="{{ route('patients.edit', $patient->id) }}" class="text-success mr-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                                </svg>
                                                            </a>
                                                            <a href="{{ route('patients.show', $patient->id) }}" class="text-primary ml-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>
                                                            </a>
                                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-outline" onclick="return confirm('Delete Patient ?')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $patients->links() }}
                                    @else
                                        Pas de patients, Veuillez ajouter un
                                    @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
