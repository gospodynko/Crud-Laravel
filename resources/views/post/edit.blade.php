@extends('layouts.layout')

@section('content')
    <h2>Edit a post:</h2>

    <form action="/post/{{$post->id}}" method="post">

        {{csrf_field()}}
        {!! method_field('patch') !!}


        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title"required value="{{$post->title}}">
        </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" type="text" name="description"required id="description"  >{{$post->description}}</textarea>
        </div>

        <div class="form-group"> 
            <label for="author_name">Author:</label>
            {{$post->author_name}}
        </div>

       

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>

       

    </form>


@endsection