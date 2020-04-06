<?php

use App\Enums\ProductCardStatusEnum;

/**
 * @var $card \App\Models\ProductCard
 */

?>
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

        {!! Form::model($card,
            ['route' => ['my.update', $card->id],
            'method' => 'put',
            'files' => true,
            ])
        !!}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                {!! Form::text('title', $card->title, ['id'=>'name', 'class'=>'form-control']); !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="description">Description</label>
                {!! Form::textarea('description', $card->description, ['rows'=>7,'id'=>'description','class'=>'form-control']); !!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                {!! Form::text('address', $card->address, ['id'=>'address', 'class'=>'form-control']); !!}
            </div>
        </div>

        <div class="form-row">
            @php($coor = "{$card->latitude},{$card->longitude}")

            <div class="form-group col-md-6">
                <img src="https://static-maps.yandex.ru/1.x/?ll={{$coor}}&size=350,250&z=12&l=map&pt={{$coor}},home" alt="">
            </div>
        </div>

        <div class="form-row align-items-start">
            @for($i=0;$i<count($card->photos);$i++)
                <img class="p-1" height="64" src="{{$card->photos[$i]}}">
            @endfor

            <label for="photos" style="cursor: pointer;">
                <img class="p-1" height="64" src="data:image/svg+xml;base64,PHN2ZyBpZD0i0KHQu9C+0LlfMSIgZGF0YS1uYW1lPSLQodC70L7QuSAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2E3YTdhNn08L3N0eWxlPjwvZGVmcz48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik00Mi42NCA2Ni4zNkg4LjI3di01NEg3N3YyN2ExLjY0IDEuNjQgMCAxMDMuMjcgMFYxMC43M2ExLjY0IDEuNjQgMCAwMC0xLjY0LTEuNjRoLTcyQTEuNjQgMS42NCAwIDAwNSAxMC43M1Y2OGExLjY0IDEuNjQgMCAwMDEuNjQgMS42NGgzNmExLjY0IDEuNjQgMCAxMDAtMy4yN3oiLz48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik00Mi42NCA1OS44MkgxNC44MnYtMTBsOC4zNS04LjM1IDExLjEzIDguMjFhMS42MyAxLjYzIDAgMDAyLjA3LS4xMWwxNy40Ni0xNS45NCA3LjExIDEwYTEuNjQgMS42NCAwIDEwMi42Ni0xLjlsLTguMTgtMTEuNUExLjYzIDEuNjMgMCAwMDUzIDMwTDM1LjE2IDQ2LjI1IDI0IDM4YTEuNjQgMS42NCAwIDAwLTIuMTMuMTZsLTcgN1YxOC45MWg1NS41OHYyMC40NWExLjY0IDEuNjQgMCAxMDMuMjcgMFYxNy4yN2ExLjY0IDEuNjQgMCAwMC0xLjY0LTEuNjRoLTU4LjlhMS42NCAxLjY0IDAgMDAtMS42NCAxLjY0djQ0LjE4YTEuNjQgMS42NCAwIDAwMS42NCAxLjY0aDI5LjQ2YTEuNjQgMS42NCAwIDEwMC0zLjI3eiIvPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTcyLjA5IDQ1LjA5QTIyLjkxIDIyLjkxIDAgMTA5NSA2OGEyMi45MyAyMi45MyAwIDAwLTIyLjkxLTIyLjkxem0wIDQyLjU1QTE5LjY0IDE5LjY0IDAgMTE5MS43MyA2OGExOS42NiAxOS42NiAwIDAxLTE5LjY0IDE5LjY0eiIvPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTczLjczIDU0LjkxaC0zLjI4djExLjQ1SDU5djMuMjhoMTEuNDV2MTEuNDVoMy4yOFY2OS42NGgxMS40NXYtMy4yOEg3My43M1Y1NC45MXpNMjMgMjguNzNhNi41NSA2LjU1IDAgMTA2LjU1LTYuNTVBNi41NSA2LjU1IDAgMDAyMyAyOC43M3ptOS44MiAwYTMuMjcgMy4yNyAwIDExLTMuMjctMy4yNyAzLjI4IDMuMjggMCAwMTMuMjcgMy4yN3oiLz48L3N2Zz4=" alt="">
            </label>

            {!! Form::file('photos[]',
                [
                'id'=>'photos',
                'class'=>'form-control',
                'style'=>'display: none',
                'multiple'=>true
                ]);
            !!}

        </div>

        @if($card->status_id !== \App\Enums\ProductCardStatusEnum::AWAITING_MODERATION)
            <div class="mt-5">
                <div class="form-check">
                    {!! Form::radio('status_id',
                        \App\Enums\ProductCardStatusEnum::ACTIVE,
                        null,
                        [
                            'class'=>'form-check-input',
                            'id'=>'status-active'
                        ]);
                    !!}
                    <label class="form-check-label" for="status-active">
                        Активна
                    </label>
                </div>
                <div class="form-check">
                    {!! Form::radio('status_id',
                        \App\Enums\ProductCardStatusEnum::BLOCKED,
                         null,
                        [
                            'class'=>'form-check-input',
                            'id'=>'status-blocked'
                        ]);
                    !!}
                    <label class="form-check-label" for="status-blocked">
                        Заблокирована
                    </label>
                </div>
                <div class="form-check">
                    {!! Form::radio('status_id',
                        \App\Enums\ProductCardStatusEnum::COMPLETED,
                         null,
                        [
                            'class'=>'form-check-input',
                            'id'=>'status-completed'
                        ]);
                    !!}
                    <label class="form-check-label" for="status-completed">
                        Завершена
                    </label>
                </div>
            </div>
        @else
            <div class="mt-5 alert alert-danger col-3">
                Ожидает модерации
            </div>
        @endif


        <div class="mt-5">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">update</button>
                <a href="{{route('my.index')}}" class="btn btn-outline-info">cansel</a>
            </div>
        </div>

        {!! Form::close() !!}


    </div>
@endsection
