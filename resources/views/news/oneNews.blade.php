@extends('layouts.app')
@section('title', $news['title'])
@php $current = 'Новости' @endphp

@section('content')

    <h1>{{ $news['title'] }}</h1>
    <p>{{ $news['text'] }}</p>
@endsection
