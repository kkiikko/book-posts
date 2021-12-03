@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
     <form action="/comments/{{$post->id}}" method="POST">
         @csrf
         <div class="body">
            <h4>感想</h4>
             <textarea name="comment[content]" placeholder="読んだ感想">{{old('comment.content')}}</textarea>
              <p class="content__error" style="color:red">{{ $errors->first('comment.content') }}</p>
         </div>
         <input type="submit" value="完了"/>
    </form>
        
@endsection