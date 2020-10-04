@extends('layouts.app')
@section('title', 'Категории новостей')

@php $current = 'Новости' @endphp
@section('content')
    
    <h1>Категории новостей</h1>
        @forelse($categories as $category)
            <a href="{{ route('news.category', [$category['slug']]) }}">{{ $category['name'] }}</a>
        @empty
            <h2>Нет категорий</h2>

        @endforelse

    <hr>
    @forelse($news as $newsOne)
        <h2>{{ $newsOne['title'] }}</h2>
        <a href="{{ route('news.newsOne', [$newsOne['id']]) }}">Подробнее...</a>
    @empty
        <h2>Нет новостей</h2>
    @endforelse
@endsection