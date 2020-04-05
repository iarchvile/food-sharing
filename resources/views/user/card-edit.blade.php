<?php

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

        {!! Form::model($card, ['route' => ['my.update', $card->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

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

        <div>
            @for($i=0;$i<count($card->photos);$i++)
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="photo-{{$i+1}}">Photo-{{$i+1}}</label><br>
                        <div style="margin-bottom: 10px">
                            <img width="100px" height="100px" src="{{$card->photos[$i]}}">
                        </div>
                        <input type="file" name="photos[]" class="form-control" id="photo-{{$i+1}}" value="{{$card->photos[$i]??''}}">
                    </div>
                </div>
            @endfor

        </div>

        <button type="submit" class="btn btn-primary">update</button>
        <a href="{{route('my.index')}}" class="btn btn-outline-info">cansel</a>
        {!! Form::close() !!}


    </div>
@endsection
