@extends('layouts.app')
@section('title')
    LaraForum
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(auth()->check())
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>
                                Welcome back {{auth()->user()->name}}
                            </h3>
                        </div>
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>
                                Welcome
                            </h2>
                        </div>
                        <div class="panel-body">
                            <h4>
                                To create your own thread or reply to the existing ones, please register or login.
                            </h4>
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Sections
                        </h2>
                    </div>

                    <div class="panel-body">
                        @foreach($sections as $section)
                            <div class="card" style="width: 50rem;">
                                <div class="card-body">
                                    <h3 class="card-title"><a href="/section/{{$section->id}}">{{$section->name}}</a></h3>
                                    @if(count($section->threads))
                                        <h4>Latest thread: <a href="/thread/{{$section->threads->last()->id}}">{{$section->threads->last()->name}}</a></h4>
                                        @else
                                        <h4>This section doesn't have any threads yet.</h4>
                                    @endif
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
