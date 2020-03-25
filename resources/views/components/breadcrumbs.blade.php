<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
        @foreach($breadcrumbs as $breadcrumb)
            @if(!$loop->last)
                <li class="breadcrumb-item"><a href="{{url($breadcrumb['url'])}}">{{$breadcrumb['title']}}</a></li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb['title']}}</li>
            @endif
        @endforeach
    </ol>
</nav>