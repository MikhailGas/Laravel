@extends('layouts.main')
@section('title', $news['title'])

@section('content')
    @include('home.menu')
    <h1>{{ $news['title'] }}</h1>
    <p>{{ $news['text'] }}</p>
@endsection
