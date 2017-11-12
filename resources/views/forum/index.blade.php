@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Sections</h2></div>

                    <div class="panel-body">
                        @foreach($sections as $section)
                            <div class="card" style="width: 50rem;">
                                <div class="card-body">
                                    <h3 class="card-title"><a href="/section/{{$section->id}}">{{$section->name}}</a></h3>
                                    <h4>Latest thread: {{$section->threads->last()->name}}</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Created by: <a href="#">
                                            {{$section->threads->last()->user->name}}</a></h6>
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
