@extends('layouts.app')
@section('title', 'Новости')
@section('menu')
    @include('menu.home_menu')
@endsection
@section('content')
  
    <ul>
    @foreach($news as $val)
        <li><a href="{{ route('news.newsOne', [$val['id']]) }}">{{ $val['title'] }}</a></li>
    @endforeach
    </ul> 
@endsection
