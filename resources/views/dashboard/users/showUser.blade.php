@extends('layouts.app')

@section('content')
    
    <div class="app" id="app">
        <div class="wrapper d-flex">
            @include('partials.sidebar')
            <div class="content flex-grow-1">
                @include('partials.navbar')
                <div class="desease">
                    <a href="/deseases" class="btn btn-default">retour</a>
                    <h1>{{$user->first_name}} {{$user->last_name}}</h1>
                    <small>description : {{$user->email}}</small>
                    <hr>
                    <a href="/deseases/{{$user->id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['App\Http\Controllers\DeseasesController@destroy',$user->id], 'methode', 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}                    
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
 