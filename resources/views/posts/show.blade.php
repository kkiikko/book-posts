<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
 <body>
        <h3>book title</h3>
        <h4>{{$post->title}}</h4>
        <h4>review<review>
        <h4>{{$post->body}}</h4>
      
      <div class="footer">
          <a href="/">back</a>
</body>
</html>
        
    