@extends('layouts.app')
@section('title', 'Категории новостей')

@section('menu')
    @include('menu.home_menu')
@endsection
@section('content')
    
        @forelse($categories as $category)
            <a href="{{ route('news.category', [$category->slug]) }}">{{ $category->name . ' |'}}</a>
        @empty
            <h2>Нет категорий</h2>

        @endforelse

    <hr>
    @forelse($news as $newsOne)
        <h2>{{ $newsOne->title }}</h2>
        <div class="row mt-2">
            <a href="{{ route('news.newsOne', [$newsOne->id]) }}">
                <img style="width:400px" src="{{ $newsOne->image ? $newsOne->image : '/storage/default.jpg' }}" alt="Картинка">
            </a>
        </div>
        
        <a href="{{ route('news.newsOne', [$newsOne->id]) }}">Подробнее...</a>
    @empty
        <h2>Нет новостей</h2>
    @endforelse
    {{ $news->links() }}
@endsection