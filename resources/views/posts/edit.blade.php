<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>book</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <<body>
     <h1>edit</h1>
     <form action="/posts/{{$post->id}}" method="POST">
         @csrf
         @method('PUT')
         <div class="title">
             <h3>題名</h3>
             <input type="text" name="post[title]" value="{{$post->title}}"/>
        </div>
        <div class="body">
            <h4>感想</h4>
            <input type="text" name="post[body]" value="{{$post->body}}"/>
        </div>
        <input type="submit" value="投稿"/>
    </form>
 </body>
</html>
                
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    