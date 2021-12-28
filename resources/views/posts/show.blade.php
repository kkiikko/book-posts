@extends('layouts.app')
@section('content')
        <h3>book title</h3>
        <h4>{{$post->title}}</h4>
        <h4>review<review>
        <h4>{{$post->body}}</h4>
         <div id='app'>
         <postlike-compont
           :post-id = "{{ json_encode($post->id) }}"
           :default-Liked = "{{ json_encode($defaultLiked) }}"
           :default-Count = "{{ json_encode($defaultCount) }}"
           ></postlike-component>
           </div>
       [<a href='/comments/{{$post->id}}/create'>comment</a>]
      <div class="footer">
          <a href="/">back</a>
@endsection
        
    