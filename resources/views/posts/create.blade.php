@extends('layouts.app')
@section('content')
     <h1>BOOK REVIEW</h1>
     <form action="/posts" method="POST">
         @csrf
         <div class="title">
             <h3>題名</h3>
             <input type="text" name="post[title]" placeholder="題名" value="{{ old('post.title') }}"/>
             <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        <div class="body">
            <h4>感想</h4>
            <textarea name="post[body]" placeholder="読んだ感想">{{ old('post.body') }}</textarea>
            <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p> 
        </div>
        <input type="submit" value="投稿"/>
    </form>
        <div class="back">[<a href="/">戻る</a>]</div>
 @endsection
            
                 