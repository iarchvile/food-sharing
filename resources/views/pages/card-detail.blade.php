<?php
/** @var \App\Models\ProductCard $card */

?>

@extends('layouts.app')

@section('content')

    @php
        $breadcrumbs = [
            [
                'url'=>route('category.show', $card->category->id),
                'title'=>$card->category->title
            ],
            [
                'title'=>$card->title
            ]
        ];
    @endphp


    <div class="container">


        <div class="py-3">
            <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        </div>


        <div class="card">

            @if(Session::has('message'))
                <p class="alert text-center {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            <div class="row">
                <aside class="col-sm-4 border-right">
                    <article class="gallery-wrap p-2">
                        <div class="img-big-wrap">
                            <img style="max-width: 100%;" src="{{$card->photos[0]}}">
                        </div>
                        <hr>
                        <div class="d-flex img-small-wrap">
                            @foreach ($card->photos as $item)
                                <div class="item-gallery p-1">
                                    <img height="75" src="{{$item}}">
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <div class="img-big-wrap">
                            @php($coor = "{$card->latitude},{$card->longitude}")

                            <img src="https://static-maps.yandex.ru/1.x/?ll={{$coor}}&size=350,250&z=12&l=map&pt={{$coor}},home" alt="">
                        </div>


                    </article>
                </aside>
                <aside class="col-sm-8">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{ $card->title }}</h3>
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{ $card->description }}</p></dd>
                        </dl>

                        @if(!Route::is('my.show'))
                            {!! Form::open([
                                'url'=>route('card.complaint', ['card' => $card->id]),
                                'method'=>'put'
                            ]) !!}

                            <button id="complaint" type="submit" class="btn btn-primary" card-id="{{$card->id}}">Пожаловаться</button>
                            {!! Form::close() !!}
                        @endif
                    </article>
                </aside>
            </div>
        </div>


    </div>


@endsection
