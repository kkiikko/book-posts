@extends('layouts.app')

@section('content')
      <body>
        <h1>BOOK検索</h1>
        <form action="/book" method="get">
            書籍名:<input type="text" name="keyword" size="50" value="{{ $keyword }}">&nbsp;<input type="submit" value="検索">
        </form>
 
        @if ($item == null)
            <p>書籍名を入力してください。</p>
         
        @endif
    </body>
@endsection

