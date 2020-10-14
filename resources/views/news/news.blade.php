@extends('layouts.app')
@section('title', 'Новости')
@section('menu')
    @include('menu.home_menu')
@endsection
@section('content')
  
    <ul>
        
        @foreach($news as $val)
            <li>
                <h2><a href="{{ route('news.newsOne', [$val->id]) }}">{{ $val->title }}</a></h2>
                <div class="row mt-2">
                    <a href="{{ route('news.newsOne', [$val->id]) }}">
                        <img style="width:200px" src="{{ $val->image ? $val->image : '/storage/default.jpg' }}" alt="Картинка">
                    </a>
                </div>
            </li>
        @endforeach
        {{ $news->links() }}
    
    
    
        
    
    </ul> 
@endsection
