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
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('patients.show', $patient->id) }}" class="text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                                        </svg>
                                                    </a>
                                                    <button class="text-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </button>
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
