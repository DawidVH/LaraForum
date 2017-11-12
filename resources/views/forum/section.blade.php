@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$section->name}}</h2>
                        <button type="button" href="/section/{{$section->id}}/create"class="btn btn-primary">Create a thread</button>
                    </div>
                    <div class="panel-body">
                        @foreach($section->threads()->get() as $thread)
                            <div class="card card-default" style="width: 60rem;">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="/thread/{{$thread->id}}">{{$thread->name}}</a></h4>

                                    <h5 class="card-subtitle mb-2 text-muted">Created by <a href="#">{{$thread->user->name}}</a>
                                         {{$thread->created_at->diffForHumans()}}</h5>
                                    <hr>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>-->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection