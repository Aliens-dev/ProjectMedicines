@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="deseases">
                    <h1>Create User</h1>
                    {!! Form::open(['action' => 'App\Http\Controllers\UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('fist_name', 'Fist name')}}
                            {{Form::text('fist_name', '', ['class' => 'form-control', 'placeholder' => 'First name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('last_name', 'Last name')}}
                            {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::email('email', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Email'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password', 'Password')}}
                            {{Form::password('password', ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder' => 'Password'])}}

                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection