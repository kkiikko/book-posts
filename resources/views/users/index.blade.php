@extends('layouts.app')

@section('content')
     <div class="own_posts">
         [<a href='/posts/create'>作成画面</a>]
         @foreach($own_posts as $post)
           <div>
               <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
               <small>{{$post->user->name}}</small>
               <p>{{$post->body}}</p>
               <form action="/posts/{{ $post->id }}" name="form_delete" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button> 
                </form>
            </div>
         @endforeach
         [<a href="/">戻る</a>]
         
         <div class='paginate'>
             {{$own_posts->links()}}
         </div>
     </div>
     
@endsection