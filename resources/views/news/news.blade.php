<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новсти</title>
</head>
<body>
    @include ('news.menu')
    <h1>Новости</h1>
    <ul>
    @foreach($news as $val)
        <li><a href="{{ route('news.newsOne', [$val['id']]) }}">{{ $val['title'] }}</a></li>
    @endforeach
    </ul>      
</body>
</html>