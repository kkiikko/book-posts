@extends('layouts.app')
@section('content')
        [<a href="/posts/create">投稿画面</a>]
        [<a href="/user">My Page</a>]
        <div class='posts'>
            {{Auth::user()->name}}
            @foreach($posts as $post)
            <div class='post'>
               <small>{{ $post->user->name }}</small>
                <h2 class='titile'>
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h2>
                <p calss='body'>{{$post->body}}</p>
            </div> 
            @endforeach
        </div>
        
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>    
        
@endsection