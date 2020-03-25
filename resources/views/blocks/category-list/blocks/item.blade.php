@foreach($categories as $category)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <a href="{{route('category.show', ['category' => $category->id])}}">
                <img src="https://fakeimg.pl/350x225/?text={{$category->title}}&font=lobster&font_size=25">
            </a>
            <div class="card-body">
                <p class="card-text">{{$category->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>
@endforeach