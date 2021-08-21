@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="deseases">
                    <h1>Create desease</h1>
                    {!! Form::open(['action' => 'App\Http\Controllers\DeseasesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description')}}
                            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'description Text'])}}
                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection