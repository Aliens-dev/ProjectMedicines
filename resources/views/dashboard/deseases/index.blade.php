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
                            <a href="{{ route('deseases.create') }}" class="btn btn-primary">Ajouter une maladie</a>
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
                            @if(count($deseases))
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom du Maladie</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($deseases as $desease)
                                            <tr>
                                                <td>{{ $desease->id }}</td>
                                                <td>{{ $desease->name }}</td>
                                                <td>
                                                    <a href="{{ route('deseases.edit', $desease->id) }}" class="text-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                        </svg>
                                                    </a>
                                                    {!! Form::open(['method'=>'DELETE', 'url' =>route('deseases.destroy', $desease->id),'style' => 'display:inline']) !!}

                                                        {!! Form::button('<i class="ft-trash"></i>delete', array('type' => 'submit','class' => 'btn btn-danger mt-2','title' => 'Delete Post','onclick'=>'return confirm("Confirm delete?")')) !!}
                    
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                Pas de Maladie, Veuillez ajouter un
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
