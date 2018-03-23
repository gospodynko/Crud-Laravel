<?php namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;
use DB;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class PostController extends Controller{
    public function index() {

         $posts= DB::table('posts')->simplePaginate(5);
      
        return view('index', compact('posts'));
}

  public function create() {
      
      return view('post.create');
    
     
}
 public function store()
         
    {
        $validator = Validator::make(Input::all(),[
            "title" =>"required|min:5:consumer",
            "description" => "required|min:5"

        ]);
        if($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getmessageBag()->toArray()
            );
        }


     $author_name = Auth::user()->name;
        $user_id  =  Auth::user()->id;
     $post = new Post;



     /*fdgfdg*/
     $post->title =request('title');
     $post->id = request('id');
     $post->description =request('description');
     $post->user_id = $user_id;
     $post->author_name = $author_name;

     $post->save();
      
              
     return redirect('/');
      
    
   
    }

public function show(Post $post){
    
return view('post.show', compact('post'));
}

public function edit(Post $post){
    
    return view('post.edit', compact('post'));
    
}
        
public function update(Post $post) {
    $user_id  =  Auth::user()->id;

    if ($user_id == $post->user_id) {

        $post->update(request()->all());
    }
        else
        {
            echo '0';


    }

    return redirect('/');
    
}
 public function destroy(Post $post){
     $user_id  =  Auth::user()->id;


        if ($user_id == $post->user_id){
            $post->delete();
        }

        else{
            echo '0';
        }

        return redirect('/');
    }
}



    
    
  
