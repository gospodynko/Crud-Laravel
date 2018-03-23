@extends('layouts.layout')

@section('content')
    <h2>Publish a post:</h2>

    <form action="/post" method="post">

        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text"  name="title" required id="title">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" type="text" name="description"required id="description"></textarea>
        </div>

        <div class="form-group">
            <label for="author_name">Author:</label>
            {{ Auth::user()->name }}
        </div>
        
        

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Post</button>
        </div>

     

    </form>


@endsection
