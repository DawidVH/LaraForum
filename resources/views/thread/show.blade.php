@extends('layouts.app')
@section('title')
    {{$thread->name}}
@endsection
@section('content')
    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$thread->name}}</h2>
                        <h4>Created by <a href="/user/{{$thread->user->id}}">{{$thread->user->name}}</a></h4>
                    </div>
                    <div class="panel-body">
                        <p>{{$thread->content}}</p>
                        @if(auth()->check())
                            @if(auth()->user()->id == $thread->user_id || auth()->user()->hasRole('admin'))
                                <form method="post" action="/thread/{{$thread->id}}" onsubmit="return ConfirmDelete()">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-link">Delete thread</button>
                                </form>
                            @endif
                        @endif

                    </div>
                </div>
                @foreach($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><a href="/user/{{$post->user->id}}">{{$post->user->name}}</a> said:</h4>
                        </div>
                        <div class="panel-body">
                            <p>{{$post->content}}</p>
                        </div>
                        @if(auth()->check())
                            @if(auth()->user()->id == $thread->user_id || auth()->user()->hasRole('admin'))
                                <form method="post" action="/post/{{$post->id}}" onsubmit="return ConfirmDelete()">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-link">Delete post</button>
                                </form>
                            @endif
                        @endif
                    </div>
                @endforeach
                @if(auth()->check())
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Post a reply</h4>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="/post/{{$thread->id}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea name="content" id="content" class="form-control" placeholder="Reply" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Reply</button>
                            </form>
                            @include('partials.error')
                        </div>
                    </div>
                @else
                    <p>Please login to post replies.</p>
                @endif
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection