@extends('layouts.app')
@section('title', $news->title)
@section('menu')
    @include('menu.home_menu')
@endsection

@section('content')
    <div class="row mt-2">
        <img style="width:600px" src="{{ $news->image ? $news->image : '/storage/default.jpg' }}" alt="Картинка">
    </div>
    <h2>{{ $news->text }}</h2>
    <p>Ресурс: {{ $news->source }}</p>
    <p>{{ $news->pubDate }}</p>
@endsection
