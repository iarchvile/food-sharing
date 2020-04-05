@extends('layouts.admin')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Список карточек</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Заголовок</th>
                                <th>Категория</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productCards as $productCard)
                                <tr>
                                    <td>{{$productCard->title}}</td>
                                    <td>{{$productCard->category->title}}</td>
                                    <td>{{$productCard->status->name}}</td>
                                    <td>{{$productCard->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.productCard.edit', ['card' => $productCard->id])}}">
                                            <i class="fas fa-edit" title="Редактировать"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.components.scripts')
    @include('admin.components.datatable_scripts')
@endsection
