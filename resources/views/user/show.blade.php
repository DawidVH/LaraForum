@extends('layouts.app')
@section('title')
    {{$user->name.'\'s profile'}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 >User profile</h2>
                    </div>
                    <div class="panel-body">
                        <h4>Name: {{$user->name}}</h4>
                        <h4>Email: {{$user->email}}</h4>
                        <h4>Date of birth: {{$user->dob}}</h4>
                        <h4>Gender: {{$user->gender}}</h4>
                        <h4>Joined forum {{$user->created_at->diffForHumans()}}</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection