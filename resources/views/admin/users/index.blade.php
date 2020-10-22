@extends('layouts.app')
@section('title', 'Пользователи')

@section('menu')
    @include('menu.admin_menu')
    
@endsection

@section('content')
    <div class="row">
        <div class="col border shadow">
            <table class="table table-striped">
                <tr>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Админ</th>
                    <th>Создан</th>
                    <th>Обновлен</th>
                    <th></th>
                </tr>
                @forelse ($users as $user)
                
                    <tr>
                        <td><a href="{{ route('user.edit', $user->id) }}" class="" title="Редактировать данные пользователя">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="@if($user->name == $auth_user) btn-secondary @else toggle @endif btn" data-id="{{ $user->id }}" @if($user->name == $auth_user) disabled @else  @endif>@if($user->isAdmin) Да @else Нет @endif</button>
                        </td>    
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a href="{{ route('user.delete', $user->id) }}" class="@if($user->name == $auth_user) btn-secondary disabled @else btn-danger @endif btn " @if($user->name == $auth_user) aria-disabled="true" @else  @endif>Удалить</a>
                        </td>
                    </tr>
                                    
                @empty
                    Нет пользователей
                @endforelse
            </table>
        </div>
        
    </div>
@endsection