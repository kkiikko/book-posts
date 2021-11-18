@extends('layouts.app')
@section('content')
        <h3>book title</h3>
        <h4>{{$post->title}}</h4>
        <h4>review<review>
        <h4>{{$post->body}}</h4>
       <p class="edit">[<a href="/posts/{{$post->id}}/edit">編集</a>]</p>
      <div class="footer">
          <a href="/">back</a>
@endsection
        
    