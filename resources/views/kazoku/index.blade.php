@extends("layouts.app_sub")
        @section("content")
        
                    <a href="/kazoku/create">家族をつくる</a>
                @foreach($kazokus as $kazoku)
                <div style="{{ $kazoku->status_class }}">
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
                        <p>状態：{{ $kazoku->status_label }}</p>
                        @foreach($kazoku->kazoku_user as $user)
                        
                        {{$user->name}}
                        
                        @endforeach
                        </p>
                        
                </div>
                @endforeach
        @endsection
    