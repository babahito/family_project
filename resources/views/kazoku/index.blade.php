
        @extends("layouts.app")
        @section("content")
        
                    <a href="/kazoku/create">家族をつくる</a>
                @foreach($kazokus as $kazoku)
                <div style="border:1px solid #666;">
                <kazoku-like
                        :initial-is-kazoku-by='@json($kazoku->isKazokuBy(Auth::user()))'
                        :initial-count-kazokus='@json($kazoku->count_kazokus)'
                        :authorized='@json(Auth::check())' 
                        endpoint="{{route('kazokus.like',['kazoku'=>$kazoku])}}"
                        >
                </kazoku-like>
                        <p>家族名：{{$kazoku->family_name}}</p>
                        
                        <p>家族誕生日：{{$kazoku->family_date}}</p>
                         <img src="{{ asset('storage/' . $kazoku->photo) }}" class="person_icon"> 
                        <p>メンバー：
                    
                        @foreach($kazoku->kazoku_user as $user)
                        
                        {{$user->name}}
                        @endforeach
                        </p>
                </div>
                @endforeach
        @endsection
    