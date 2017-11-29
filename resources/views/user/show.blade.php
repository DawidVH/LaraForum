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
                        {{--<img src="{{load(public_path('uploads/avatars/profile.svg'))}}" alt="avatar" width="200" height="200"/>--}}

                        @if(auth()->id()==$user->id)
                            <form class="form-horizontal" method="POST" action="/user/{{$user->id}}">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" name="name" value="{{$user->name}}" class="form-control" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" name="email" value="{{$user->email}}" class="form-control" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dob" class="col-md-4 control-label">Date Of Birth</label>
                                    <div class="col-md-6">
                                        <input id="dob" type="date" name="dob" value="{{$user->dob}}" class="form-control" min="1990-01-01" max="2007-01-01" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-md-4 control-label">Gender</label>
                                    <div class="col-md-6">
                                            <input id="gender" type="radio" name="gender" value="male" @if($user->gender=='male') checked @endif> Male<br>
                                            <input id="gender" type="radio" name="gender" value="female" @if($user->gender=='female') checked @endif > Female<br>
                                            <input id="gender" type="radio" name="gender" value="other" @if($user->gender=='other') checked @endif required autofocus> Other
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @include('partials.error')
                        @else
                            <div class="col-md-8 col-md-offset-0">
                                <h4>Name: {{$user->name}}</h4>
                                <h4>Email: {{$user->email}}</h4>
                                <h4>Date of birth: {{$user->dob}}</h4>
                                <h4>Gender: {{$user->gender}}</h4>
                                <h4>Joined forum {{$user->created_at->diffForHumans()}}</h4>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection