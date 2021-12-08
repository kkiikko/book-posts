@extends('layouts.app')
@section('content')
<div id="app">
    <like-component
:user-id = "{{ json_encode($user->id) }}"
:default-Liked = "{{ json_encode($defaultLiked) }}"
:default-Count = "{{ json_encode($defaultCount) }}"
></like-component>
</div>
@foreach($user->posts as $post)
<p>{{$post->title}}</p>
<p>{{$post->body}}</p>
         
@endforeach
 
         
     
@endsection
