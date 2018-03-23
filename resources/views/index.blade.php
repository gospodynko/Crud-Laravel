
@extends ('layouts.layout')

@section ('content')

<div class ='row'>
@foreach ($posts as $post)

    <div class ='col-md'>
    <article>
        <h2><a href="/post/{{$post->id}}">{{$post->title}}</a></h2>
        <p>
            {{mb_substr($post->description,0,100,'UTF-8')}}
        </p>
        <p>
            {{$post->author_name}}
        </p>
        <p>
            published: {{date('d-m-Y', strtotime($post->updated_at))}}

        </p>
        <p>
            <a href="/post/{{$post->id}}" class='btn btn-default'>Подробнее</a>
        </p>
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
        </form>

    </article>
    </div>
  
@endforeach
            
  </div>
<?php echo $posts->render(); ?>
@endsection

