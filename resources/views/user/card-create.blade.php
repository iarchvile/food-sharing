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

        {!! Form::open(['route' => ['my.store']]) !!}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                {!! Form::text('title', '', ['id'=>'name', 'class'=>'form-control']); !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="description">Description</label>
                {!! Form::textarea('description', '', ['rows'=>7,'id'=>'description','class'=>'form-control']); !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="category">Category</label>
                {!! Form::select('products_category_id', $categories, ['id'=>'category','class'=>'form-control']); !!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                {!! Form::text('address', '', ['id'=>'address', 'class'=>'form-control']); !!}
            </div>
        </div>

        <div>

            @for($i=0;$i<1;$i++)
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="photo-{{$i+1}}">Photo-{{$i+1}}</label>
                        <input type="text" name="photos[]" class="form-control" id="photo-{{$i+1}}">
                    </div>
                </div>
            @endfor

        </div>

        <button type="submit" class="btn btn-primary">update</button>
        <a href="{{route('my.index')}}" class="btn btn-outline-info">cansel</a>
        {!! Form::close() !!}


    </div>
@endsection