@extends('layouts.app');
@section('content')
        <div class="container" style="max-width: 600px">
            @if(session('info'))
                <div class="alert alert-warning border-primary">Comment-Deleted</div>               
            @endif
            <div class="card mb-3 p-4 border-danger">

                <h5 class="card-title">{{$article->title}}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{$article->created_at->diffForHumans()}}
                    Category: <b>{{$article->category->name}}</b>
                </div>
                <div class="card-body p-0">{{$article->body}}</div>

                <a class="btn btn-primary btn-sm w-25 float-end" href="{{url("/articles/details/delete/$article->id")}}">Delete</a>  
            </div>  

            @if (session('error'))
                <div class="alert alert-info text-center">{{session('error')}}</div>
            @endif
            @if (session('indo'))
                <div class="alert alert-info">Comment-deleted</div>
            @endif

            <ul class="list-group">
                <li class="list-group-item border-info">
                    Comments - {{count($article->comments)}}
                </li>
                @foreach ($article->comments as $comment)
                
                <li class="list-group-item border-info">
                    By: <b>{{$comment->user->name}}</b><br>
                    {{$comment->content}}
                    <a href="{{url("/comments/delete/$comment->id")}}" class="btn btn-close btn-sm float-end"></a>
                </li>
                @endforeach
            </ul>
            <form action="{{url('/comments/add')}}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}" class="form-control">
                <textarea name="content" class="form-control mb-2 border-info" placeholder="New Comment" ></textarea>
                <button class="btn btn-primary">Add Comment</button>
            </form>
        </div>
@endsection