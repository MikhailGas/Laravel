@extends('layouts.app')
@section('title', $news['title'])
@section('menu')
    @include('menu.home_menu')
@endsection

@section('content')
    <p>{{ $news['text'] }}</p>
@endsection
