@extends('layouts.app')
@section('content')
     <h1>BOOK REVIEW</h1>
     <form action="/posts" method="POST">
         @csrf
         <div class="title">
             <h3>題名</h3>
             <input name="post[title]"  value="{{ $item['volumeInfo']['title']}}">
             <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        <div class="body">
            <h4>感想</h4>
            <textarea name="post[body]" placeholder="読んだ感想">{{ old('post.body') }}</textarea>
            <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p> 
        </div>
        <input name="book[title]" type="hidden" value="{{ $item['volumeInfo']['title']}}">
        <input name="book[image]" type="hidden" value="{{ $item['volumeInfo']['imageLinks']['thumbnail']}}">
        <input name="book[author]" type="hidden" value="{{ $item['volumeInfo']['authors'][0]}}">
        <input name="book[date]" type="hidden" value="{{ $item['volumeInfo']['publishedDate']}}">
        <input type="submit" value="投稿"/>
    </div>
     @if ($item == null)
            <p>書籍名を入力してください。</p>
        @else (count($items) > 0)
            <p>「{{ $keyword }}」の検索結果</p>
            <hr>
            
            <h2>{{ $item['volumeInfo']['title']}}</h2>
                @if (array_key_exists('imageLinks', $item['volumeInfo']))
                    <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail']}}"><br>
                @endif
                                
                @if (array_key_exists('authors', $item['volumeInfo']))
                    著者：{{ $item['volumeInfo']['authors'][0]}}<br>
                @endif
                @if (array_key_exists('publishedDate', $item['volumeInfo']))
                    発売年月：{{ $item['volumeInfo']['publishedDate']}}<br>
                @endif
                
         
        @endif
        <div class="back">[<a href="/">戻る</a>]</div>
 @endsection
            
                 