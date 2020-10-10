@extends('layouts.app')
@section('title', 'Создать новость')
@section('menu')
    @include('menu.admin_menu')
    
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.create') }}" class="mt-5">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок новости</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-md-4 col-form-label text-md-right">Категория новости</label>

            <div class="col-md-6">
                <select name="category_id" id="category_id" class="form-control">
                    @forelse ($categories as $item)
                        <option @if($item['name'] == old('category_id')) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @empty
                        <option value="0">Нет категорий</option>
                    @endforelse
                    

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="text" class="col-md-4 col-form-label text-md-right">Текст новости</label>

            <div class="col-md-6">
                <textarea id="text" class="form-control" name="text">{{ old('text') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input @if(old('isPrivate')) checked @endif class="form-check-input" type="checkbox" name="isPrivate" id="isPrivate" value="1" {{ old('isPrivate') ? 'checked' : '' }}>

                    <label class="form-check-label" for="isPrivate">
                        Приватная
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Создать
                </button>
            </div>
        </div>
    </form>
@endsection
