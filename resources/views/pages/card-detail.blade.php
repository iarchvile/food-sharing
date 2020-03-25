<?php
/** @var \App\Models\ProductCard $card */

?>

@extends('layout.base')

@section('body')

    @php
        $breadcrumbs = [
            [
                'url'=>route('category.show', ['category'=>$card->category->id]),
                'title'=>$card->category->title
            ],
            [
                'title'=>$card->title
            ]
        ];
    @endphp

    <div class="container">

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">{{$card->title}}</h1>
            <p class="lead">{{$card->description}}</p>
        </div>

        <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>

        <div class="card product-card-detail">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252"></div>
                            <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252"></div>
                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252"></div>
                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252"></div>
                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252"></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active">
                                <a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126"></a>
                            </li>
                            <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126"></a>
                            </li>
                            <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126"></a>
                            </li>
                            <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126"></a>
                            </li>
                            <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126"></a>
                            </li>
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title pt-md-2">men's shoes fashion</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                        <h4 class="price">current price: <span>$180</span></h4>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong>
                        </p>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection