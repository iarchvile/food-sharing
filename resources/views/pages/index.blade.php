@extends('layout.base')

@section('body')

    <div class="container">

    <div class="flex-center position-ref">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/my') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">food-sharing.ru</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
    </div>

    @include('blocks.category-list.index')

    </div>
@endsection