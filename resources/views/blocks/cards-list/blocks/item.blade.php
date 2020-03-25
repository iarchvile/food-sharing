@foreach($cards as $card)
    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="{{route('card.show', ['card'=>$card->id])}}">
                <img src="https://fakeimg.pl/350x225/?text={{$card->title}}&font=lobster&font_size=25">
            </a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{route('card.show', ['card'=>$card->id])}}">{{$card->title}}</a>
                </h4>
                <p class="card-text">{{$card->description}}</p>
            </div>
        </div>
    </div>

@endforeach