<table class="table table-borderless col-10">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Status</th>
        <th scope="col">Created at</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>

    @foreach($cards as $card)
        <tr>
            <td><a href="{{route('my.show', ['my'=>$card->id])}}">{{$card->title}}</a></td>
            <td>{{$card->status->name}}</td>
            <td>{{$card->created_at}}</td>
            <td><a class="btn btn-outline-info" href="{{route('my.edit', ['my'=>$card->id])}}">Edit</a></td>
        </tr>
    @endforeach

    </tbody>
</table>