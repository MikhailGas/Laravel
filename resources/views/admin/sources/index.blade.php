@extends('layouts.app')
@section('title', 'Ресурсы новостей')

@section('menu')
    @include('menu.admin_menu')
    
@endsection

@section('content')
<div class="row">
    <a href="{{ route('source.add') }}" class="btn btn-success mb-1">Добавить ресурс</a>
</div>
<div class="row">
    <div class="col border shadow">
        <table class="table table-striped">
            <tr>
                <th>Ресурс</th>
                <th>URL адрес</th>
                <th></th>
            </tr>
            @forelse ($sources as $item)
            
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->link }}</td>
                    <td>
                        <a href="{{ route('source.delete', $item->id) }}" class="btn btn-danger" >Удалить</a>
                    </td>    
                    
                </tr>
                                
            @empty
                Нет ресурсов
            @endforelse
        </table>
    </div>
    
</div>
    
@endsection