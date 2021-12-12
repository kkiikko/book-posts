<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Book;

class PostController extends Controller
{
    public function index(Post $post)
     {
         
         return view('posts/index')->with(['posts'=>$post->getPaginateByLimit()]);
     }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post'=>$post]);
    }
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input_book = $request['book'];
        $book = Book::create([
            'title' => $input_book['title'] ,
            'image' => $input_book['image'] ,
            'author' => $input_book['author'] ,
            'year' => $input_book['date'] ,
        ]);
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $input_post += ['book_id' => $book->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
        
    }
    
    public function edit(Post $post)
    {
        return view('/posts/edit')->with(['post'=>$post]);
    }
    
    public function update(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/user');
    }
    
}
