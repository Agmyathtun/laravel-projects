@extends('layouts.app')
@section('content')
    <div class="container" style="max-width:600px">

        @if ($errors->any())
            <div class="alert alert-warning text-center border-danger">
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
    
    <form method="POST">
        @csrf
        <div class="mb-2">
            <label>Title</label>
            <input type="text" name="title" class="form-control mb-3">
        </div>
        <div class="mb-2">
            <label>body</label>
            <textarea name="body" class="form-control mb-2"></textarea>
        </div>
        <div class="mb-2">
            <label>Category</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
      <button class="btn btn-primary">Add Article</button>
    </form> 
</div>
@endsection