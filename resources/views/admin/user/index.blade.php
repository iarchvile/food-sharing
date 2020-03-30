@extends('layouts.admin')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Список пользователей</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Почта</th>
                                <th>Роль</th>
                                <th>Дата регистрации</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.user.edit', ['user' => $user->id])}}">
                                            <i class="fas fa-edit" title="Редактировать"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.components.scripts')
    @include('admin.components.datatable_scripts')
@endsection
