@extends('layouts.app')
@section('content')
        <h3>book title</h3>
        <small>{{$post->user->name}}</small>
        <h4>{{$post->title}}</h4>
        <h4>review<review>
        <h4>{{$post->body}}</h4>
       [<a href='/comments/{{$post->id}}/create'>comment</a>]
      <div class="footer">
          <a href="/">back</a>
@endsection
        
    