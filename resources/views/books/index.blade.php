@extends('layouts.app')

@section('content')
      <body>
        <h1>BOOKSEARCH</h1>
        <form action="/book" method="get">
            書籍名:<input type="text" name="keyword" size="50" value="{{ $keyword }}">&nbsp;<input type="submit" value="検索">
        </form>
 
        @if ($item == null)
            <p>書籍名を入力してください。</p>
        @else (count($item) > 0)
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
                <br>
                @if(array_key_exists('industryIdentifiers', $item['volumeInfo']))
                @foreach ($item['volumeInfo']['industryIdentifiers'] as $industryIdentifier)
                    {{ $industryIdentifier['type'] }}&nbsp;：&nbsp;{{ $industryIdentifier['identifier'] }} <br>
                @endforeach
                @endif
                <br>
                @if (array_key_exists('description', $item['volumeInfo']))
                    概要：{{ $item['volumeInfo']['description']}}<br>
                @endif
                <br>
                <hr>
        
        @endif
    </body>
@endsection

