@extends('layouts.main')
@section('title', 'Новости')
@section('content')
    @include ('home.menu')
    <h1>Новости</h1>
    <ul>
    @foreach($news as $val)
        <li><a href="{{ route('news.newsOne', [$val['id']]) }}">{{ $val['title'] }}</a></li>
    @endforeach
    </ul> 
@endsection
