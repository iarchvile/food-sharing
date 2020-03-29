<?php
/** @var \App\Models\ProductCard $card */

?>

@extends('layout.base')

@section('body')

    @php
        $breadcrumbs = [
            [
                'title'=>'New card'
            ]
        ];
    @endphp

    <div class="container">

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">New card</h1>
            <p class="lead">description</p>
        </div>

        <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        <x-form-errors :errors="$errors"/>

        {!! Form::model(new \App\Models\ProductCard(), ['route' => 'card.store', 'class'=>'bg-white border p-5']); !!}

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                {!! Form::text('title', null, ['class'=>'form-control', 'id'=>'title']); !!}
            </div>
        </div>

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    {!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'custom-select']); !!}
                </div>
            </div>
        </div>

        {{--<select class="custom-select" id="inputGroupSelect02">
            <option selected>Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>--}}

        <div class="form-group row">
            <div class="col-sm-10">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']); !!}
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection