@extends('layouts.app')
@section('content')
     <h1>edit</h1>
     <form action="/posts/{{$post->id}}" method="POST">
         @csrf
         @method('PUT')
         <div class="title">
             <h3>題名</h3>
             <input type="text" name="post[title]" value="{{$post->title}}"/>
        </div>
        <div class="body">
            <h4>感想</h4>
            <input type="text" name="post[body]" value="{{$post->body}}"/>
        </div>
        <input type="submit" value="投稿"/>
    </form>
@endsection
                
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    