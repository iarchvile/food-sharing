@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <a class="btn btn-success" href="{{route('my.create')}}">Add +</a>

            <div class="d-flex w-100">
                @include('user.blocks.menu.index')
                @include('user.blocks.card-list.index')
            </div>

            <div class="text-center">
                {{ $cards->links() }}
            </div>

        </div>
    </div>
@endsection