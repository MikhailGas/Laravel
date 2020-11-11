@extends('layouts.app')
@section('title', 'Создать новость')
@section('menu')
    @include('menu.admin_menu')
    
@endsection

@section('content')
    <div class="row justify-content-center">
        <form method="POST" action="@if(isset($news->id)) {{ route('news.update', $news) }} @else {{ route('news.store') }} @endif" class="mt-5 border p-2 col col-md-6" enctype="multipart/form-data">
            @csrf
            @if (isset($news->id))
                @method('PUT')
            @endif
            @if($errors->has('title'))
                <div class="alert alert-danger">
                    @foreach($errors->get('title') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок новости</label>
    
                <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ $news->title ?? old('title')  }}" autofocus>
                </div>
            </div>
    
            @if($errors->has('category_id'))
                <div class="alert alert-danger">
                    @foreach($errors->get('category_id') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group row">
                <label for="category_id" class="col-md-4 col-form-label text-md-right">Категория новости</label>
    
                <div class="col-md-6">
                    
                    <select name="category_id" id="category_id" class="form-control">
                        @forelse ($categories as $item)
                            <option @if($item->id == ($news->category_id ?? old('category_id') )) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                            <option value="0">Нет категорий</option>
                        @endforelse
                        
    
                    </select>
                </div>
            </div>
            @if($errors->has('text'))
                <div class="alert alert-danger">
                    @foreach($errors->get('text') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group row">
                <label for="text" class="col-md-4 col-form-label text-md-right">Текст новости</label>
    
                <div class="col-md-6">
                    <textarea id="text" class="form-control" name="text">{{ $news->text ?? old('text') }}</textarea>
                </div>
            </div>
    
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input @if(old('isPrivate') || ($news->isPrivate ?? '') ) checked @endif class="form-check-input" type="checkbox" name="isPrivate" id="isPrivate" value="1" {{ old('isPrivate') ? 'checked' : '' }}>
    
                        <label class="form-check-label" for="isPrivate">
                            Приватная
                        </label>
                    </div>
                </div>
            </div>
    
            @if($errors->has('image'))
                <div class="alert alert-danger">
                    @foreach($errors->get('image') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="image">
                    Картинка для новости
                </label>
                <div class="col-md-6">
                    <input type="file" name="image" id="image">    
                </div>
               
            </div>
    
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        @if (isset($news->id)) Изменить @else Создать @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
    
@endsection
