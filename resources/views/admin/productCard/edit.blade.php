@extends('layouts.admin')

@section('title', 'Карточка продукта')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Карточка продукта</h4>
                    <form action="{{route('admin.productCard.update', ['card' => $productCard->id])}}" method="post" class="form-horizontal m-t-40">
                    @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label>Жалоба</label>
                            <div class="switch">
                                <label>OFF
                                    <input type="checkbox" name="is_сomplaint" @if($productCard->is_сomplaint)checked @endif><span class="lever"></span>ON</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Категория</label>
                            <select name="products_category_id" class="form-control">
                                @foreach($productsCategories as $productsCategory)
                                    <option value="{{$productsCategory->id}}" @if($productsCategory->id == $productCard->products_category_id)selected @endif>{{$productsCategory->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Заголовок</label>
                            <input name="title" class="form-control" readonly value="{{$productCard->title}}">
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea name="description" class="form-control" rows="5" readonly>{{$productCard->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Статус</label>
                            <select name="status_id" class="form-control">
                                @foreach($productCardsStatuses as $productCardsStatus)
                                    <option value="{{$productCardsStatus->id}}" @if($productCardsStatus->id == $productCard->status_id)selected @endif>{{$productCardsStatus->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
