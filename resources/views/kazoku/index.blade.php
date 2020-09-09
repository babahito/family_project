
        @extends("layouts.app")
        @section("content")
        
                    <a href="/kazoku/create">家族をつくる</a>
                @foreach($kazokus as $kazoku)
                        <p>{{$kazoku->family_name}}</p>
                        <p>{{$kazoku->family_date}}</p>
                        <img src="{{ asset('storage/' . $kazoku->photo) }}">
                @endforeach
        @endsection
    