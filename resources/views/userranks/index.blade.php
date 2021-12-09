@extends('layouts.app')

@section('content')
     @foreach($users as $rank)
        <div class='ranks'>
    
                <p>
                {{$rank->name}}
                </p>
                <p>{{$rank->liked_users_count}}</p>
            </div>
        @endforeach
        </div>
           
     
@endsection

