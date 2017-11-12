@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$thread->name}}</h2>
                        <h4>Created by {{$thread->user->name}}</h4>
                    </div>
                    <div class="panel-body">
                        <p>{{$thread->content}}</p>
                    </div>
                </div>
                @foreach($thread->posts()->get() as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>{{$post->user->name}}</h4>
                        </div>
                        <div class="panel-body">
                            <p>{{$post->content}}</p>
                        </div>
                    </div>
                @endforeach
                @if(auth()->check())
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Post a reply</h4>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="/thread/{{$thread->id}}/post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea name="content" id="content" class="form-control" placeholder="Reply" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Reply</button>
                            </form>
                        </div>
                    </div>
                @endif
                </div>
        </div>
    </div>
@endsection