@extends('layouts.app')
@section('title', 'Админка')

@section('menu')
    @include('menu.admin_menu')
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 border shadow">
            @forelse ($news as $item)
                <h4><a href="{{ route( 'news.show', $item->id) }}">{{ $item->title }}</a></h4>
                <div class="row">
                    <form class="ml-3" action="{{ route('news.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Удалить" class="btn btn-primary">
                    </form>
                    <form class="ml-2" action="{{ route('news.edit', $item->id) }}" method="GET">
                        @csrf
                        <input type="submit" value="Редактировать" class="btn btn-primary">
                    </form>
                </div>
                
                
                
                <hr>
            @empty
                Нет новостей
            @endforelse
            {{ $news->links() }}
        </div>
        <div class="col-md-8 border shadow">
            @if( isset( $newsOne) )
                <h1>{{ $newsOne->title }}</h1>
                <div class="row mt-2">
                    <img class="ml-3" style="width:600px" src="{{ $newsOne->image ? $newsOne->image : '/storage/default.jpg' }}" alt="Картинка">
                </div>
                <p>{{ $newsOne->text }}</p>
            @endif
        </div>
    </div>
@endsection
