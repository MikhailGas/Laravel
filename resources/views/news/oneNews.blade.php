@extends('layouts.app')
@section('title', $news->title)
@section('menu')
    @include('menu.home_menu')
@endsection

@section('content')
    <div class="row mt-2">
        @if($news->source)
            <img style="width:600px" src="{{ $news->image ? $news->image : '/storage/default.jpg' }}" alt="Картинка">
            <h2>{{ $news->text }}</h2>
            <p>Ресурс: {{ $news->source }}</p>
        @else 
            {!! $news->text !!}
        @endif    
    </div>
    
    
    
@endsection
