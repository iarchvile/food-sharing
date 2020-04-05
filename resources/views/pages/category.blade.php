@extends('layout.base')

@section('body')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">{{$category->title}}</h1>
        <p class="lead">{{$category->description}}</p>
    </div>

    @include('blocks.cards-list.index')
@endsection