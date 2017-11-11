@extends('layouts.app')
@section('content')
    <h2>Sections</h2>
    <hr>
    @foreach($sections as $section)
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h3 class="card-title"><a href="/section/{{$section->id}}">{{$section->name}}</a></h3>
                <h4>Latest thread: {{$section->threads->last()->name}}</h4>
               <!-- <h6 class="card-subtitle mb-2 text-muted">{{}}</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>-->
            </div>
        </div>
    @endforeach
@endsection