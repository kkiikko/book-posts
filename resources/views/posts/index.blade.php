@extends('layouts.app')
@section('content')
        <p>{{Auth::user()->name}}</p>
        [<a href="/posts/create">投稿画面</a>]
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <h2 class='titile'>
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h2>
                <p calss='body'>{{$post->body}}</p>
                <form action="/posts/{{$post->id}}" name="delete" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
            </div> 
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>    
@endsection