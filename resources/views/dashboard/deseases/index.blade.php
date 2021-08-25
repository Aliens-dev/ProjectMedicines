@extends('layouts.app')
@section('title', 'Liste des maladies')
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
                            <a href="{{ route('deseases.create') }}" class="btn btn-primary">Ajouter une maladie</a>
                        </div>
                        <form action="{{route('deseases.search')}}" class="form-inline col-xl-4 col-md-6 d-flex justify-content-end">
                            <div class="mb-2 form-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="Rechercher un N° ID">
                            </div>
                            <button class="btn btn-info mb-2 ml-1">Rechercher</button>
                        </form>
                    </div>
                    <div class="limiter pt-1 pr-4 pl-4">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                @if(count($deseases))
                                    <table class="table table-bordered">
                                        <thead class=" header thead-dark">
                                        <tr class="header">
                                            <th scope="col" class="cell">ID</th>
                                            <th scope="col" class="cell">Nom du Maladie</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($deseases as $desease)
                                                <tr>
                                                    <td class="cell">{{ $desease->id }}</td>
                                                    <td class="cell">{{ $desease->name }}</td>
                                                    <td class="d-flex justify-content-center align-items-center cell">
                                                        <a href="{{ route('deseases.edit', $desease->id) }}" class="text-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('deseases.destroy', $desease->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline" onclick="return confirm('Suprimmer l\'utilisateur ?')">
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
                                    {{$deseases->links()}}
                                @else
                                    Pas de Maladie, Veuillez ajouter un
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
