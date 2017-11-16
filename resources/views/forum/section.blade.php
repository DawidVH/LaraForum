@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$section->name}}</h2>
                        @if(auth()->check())
                            <p>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCreateThread" aria-expanded="false" aria-controls="collapseExample">
                                    Create a thread
                                </button>
                            </p>
                            @if(count($errors))
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="collapse" id="collapseCreateThread">
                                <div class="card card-default">
                                    <div class="card-heading">
                                        <h4>Create a thread</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="/section/{{$section->id}}/create">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input name="title" id="title" class="form-control" placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="content" id="content" class="form-control" placeholder="Content" rows="5"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Post</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Please login to post a thread.</p>
                        @endif
                    </div>
                </div>
                @foreach($section->threads()->latest()->get() as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><a href="/section/{{$section->id}}/{{$thread->id}}">{{$thread->name}}</a></h2>
                            <h5 class="card-subtitle mb-2 text-muted">Created by <a href="/user/{{$thread->user->id}}">{{$thread->user->name}}</a>
                                {{$thread->created_at->diffForHumans()}}</h5>
                        </div>
                        <div class="panel-body">
                            <h5 class="card-subtitle mb-2 text-muted">{{$thread->content}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection