@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($user, ['route' => ['user.settings.update'], 'method' => 'put']) !!}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Имя</label>
                {!! Form::text('name', $user['name'], ['id'=>'name', 'class'=>'form-control']); !!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone">Телефон</label>
                {!! Form::text('phone', $user['phone'], ['id'=>'phone', 'class'=>'form-control']); !!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Адресс</label>
                {!! Form::text('address', $user['address'], ['id'=>'address', 'class'=>'form-control']); !!}
            </div>
        </div>

        <div class="form-row">
            @php($coor = "{$user['latitude']},{$user['longitude']}")

            <div class="form-group col-md-6">
                <img src="https://static-maps.yandex.ru/1.x/?ll={{$coor}}&size=350,250&z=12&l=map&pt={{$coor}},home"
                     alt="">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{route('my.index')}}" class="btn btn-outline-info">cansel</a>
        {!! Form::close() !!}

    </div>
@endsection
