<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost(Post $post){
        $post->delete();
        return redirect('/baru');
    }


    public function actuallyUpdatePost(Post $post, Request $request){
        $incomingField=$request->validate([
            'title'=> 'required',
            'body' => 'required'
        ]);

        $incomingField['title']=strip_tags($incomingField['title']);
        $incomingField['body']=strip_tags($incomingField['body']);
        //agar data tidak diambil

      $post->update($incomingField);
      return redirect('/baru');
    }

    public function showEditScreen(Post $post){
        return view('edit-post', ['post'=> $post]);
    }
    public function createPost(Request $request){
        $incomingField =$request->validate ([
            'title' => 'required',
            'body' => 'required'

        ] );//memastikan semua kolom terisi

        $incomingField['title']=strip_tags($incomingField['title']);
        $incomingField['body']=strip_tags($incomingField['body']);
        //agar data tidak diambil

        Post::create ($incomingField); // untuk post data
        return redirect('/baru');
    }
}
