@foreach($cards as $card)
    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="{{route('card.show', ['card'=>$card['id']])}}">
                <img src="{{$card['photos'][0]}}">
            </a>
            <div class="card-body">
                <p class="h5">
                    <a href="{{route('card.show', ['card'=>$card['id']])}}">{{$card['title']}}</a>
                </p>
                <p class="card-text">{{$card['description']}}</p>
            </div>
        </div>
    </div>
@endforeach
