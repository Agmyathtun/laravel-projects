@extends('layouts.app');
@section('content')
<div class="container" style="max-width: 600px">
        
            {{$articles->links()}}

            @if (session('info'))
                <div class="alert alert-danger text-center">Article Deleted</div>
                
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-center">Unauthorized</div>
                
            @endif

            @foreach ($articles as $article )
                <div class="card mb-3 p-2 ps-3 border-danger">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        Created By: <b>{{$article->user->name}}</b>
                        {{$article->created_at->diffForHumans()}}
                        Category: {{$article->category->name}}
                        Comments: {{count($article->comments)}}
                    </div>
                    <div class="card-body p-0">{{$article->body}}</div>
                    <a href="{{url("/articles/details/$article->id")}}" class="text-decoration-none mt-3 text-end">View Detailes..</a>
                </div>    
            @endforeach
        </div>
@endsection
