@extends('layouts.app')
@section('content')

<main role="main" class="container">
    @foreach($sections as $section)
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h4 class="card-title"><a href="/section/{{$section->id}}">{{$section->name}}</a></h4>
               <!-- <h6 class="card-subtitle mb-2 text-muted">{{}}</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>-->
            </div>
        </div>
    @endforeach
</main>
@endsection