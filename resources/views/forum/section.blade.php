@extends('layouts.app')
@section('content')
    <h2>{{$section->name}}</h2>
    @foreach($section->threads()->get() as $thread)
        <div class="card card-default" style="width: 60rem; padding: 1rem; margin: 2rem auto;">
            <div class="card-body">
                <h4 class="card-title"><a href="/section/{{$thread->section_id}}/{{$thread->name}}">{{$thread->name}}</a></h4>
                <hr>
                <h5 class="card-subtitle mb-2 text-muted"><a href="#">{{$thread->user->name}}</a>
                    created {{$thread->created_at->diffForHumans()}}</h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>-->
            </div>
        </div>
    @endforeach
@endsection