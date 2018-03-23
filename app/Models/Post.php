<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Post extends Model{
    protected $fillable = ['title', 'description', 'author_name','user_id','created_at'];



}



