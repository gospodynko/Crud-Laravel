@extends('layouts.layout')

@section('content')

<div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">  published: {{date('d-m-Y', strtotime($post->updated_at))}} </p>
              <p > {{$post->author_name}}</p>

            <p>{{$post->description}}</p>
              <?php if (!empty(Auth::user()->name) ) : ?>

              <?php if ($post->author_name == Auth::user()->name ) : ?>
              <p>
                  <a href="/post/{{$post->id}}/edit" class='btn btn-primary'>Редактировать</a>
              </p>

              <form action="/post/{{$post->id}}" method="post">
                  {{csrf_field()}}
                  {!!method_field('delete')!!}
                  <button type ="submite" class="btn btn-danger">Удалить</button>

              <?php endif; ?>
              <?php endif; ?>
           
        </div><!-- /.blog-sidebar -->

      </div>    </div>
 @endsection

