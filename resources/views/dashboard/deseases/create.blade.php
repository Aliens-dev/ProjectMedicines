@extends('layouts.app')
@section('title', 'Ajouter une maladie')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="patients">
                    <div class="row mt-5 mb-5 mr-5 ml-5">
                        <div class="col">
                            <form action="{{ route('deseases.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nom de Maladie</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col">
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary mr-1" value="Ajouter">
                                    <input type="reset" class="btn btn-info" value="RĂ©initialiser">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
