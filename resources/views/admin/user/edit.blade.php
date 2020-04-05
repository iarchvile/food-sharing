@extends('layouts.admin')

@section('title', 'Карточка продукта')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Пользователь</h4>
                    <form action="{{route('admin.user.update', ['user' => $user->id])}}" method="post" class="form-horizontal m-t-40">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label>Роль</label>
                            <select name="user_roles_id" class="form-control" @cannot('user_role_update') disabled @endcannot>
                                @foreach($userRoles as $userRole)
                                    <option value="{{$userRole->id}}" @if($userRole->id == $user->role->id)selected @endif>{{$userRole->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Имя</label>
                            <input name="name" class="form-control" readonly value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label>Почта</label>
                            <input name="email" class="form-control" readonly value="{{$user->email}}">
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
