@extends('layouts.app')

@section('content')
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="deseases">
                    <h1>edit User</h1>
                    {!! Form::open(['action' => ['App\Http\Controllers\UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('fist_name', 'Fist name')}}
                            {{Form::text('fist_name', $user->first_name, ['class' => 'form-control', 'placeholder' => 'First name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('last_name', 'Last name')}}
                            {{Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => 'Last name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::email('email', $user->email, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Email'])}}
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection