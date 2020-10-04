@extends('layouts.app')
@section('title', 'Новости')
@php $current = 'Новости' @endphp
@section('content')
  
    <h1>Новости</h1>
    <ul>
    @foreach($news as $val)
        <li><a href="{{ route('news.newsOne', [$val['id']]) }}">{{ $val['title'] }}</a></li>
    @endforeach
    </ul> 
@endsection
