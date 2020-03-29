@foreach($categories as $category)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <a href="{{route('category.show', ['category' => $category->id])}}">
                <img src="{{$category->photo}}">
            </a>
            <div class="card-body">
                <p class="h5">
                    <a href="{{route('category.show', ['category' => $category->id])}}">{{$category->title}}</a>
                </p>
                <p class="card-text">{{$category->description}}</p>
            </div>
        </div>
    </div>
@endforeach