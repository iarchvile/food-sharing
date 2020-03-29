<?php
/** @var \App\Models\ProductCard $card */

?>

@extends('layout.base')

@section('body')

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
            <div class="row">
                <aside class="col-sm-4 border-right">
                    <article class="gallery-wrap p-2">
                        <div class="img-big-wrap">
                            <img src="{{$card->photos[0]}}">
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

                        <p class="price-detail-wrap">
                            <span class="price h3">
                                0000
                            </span>
                        </p>
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{ $card->description }}</p></dd>
                        </dl>


                        <hr>

                        <div class="text-right">
                            <a href="#" @click.prevent="goEdit(data.id)" class="btn btn-primary">edit</a>
                        </div>


                    </article>
                </aside>
            </div>
        </div>


    </div>


@endsection