@extends("layouts.app_sub")
        @section("content")
        
                    <a href="/kazoku/create">家族をつくる</a>
                @foreach($kazokus as $kazoku)
               
                <div style="{{ $kazoku->status_class }}">
                <div style="border:1px solid #aaa;margin-bottom:10px;">
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
                        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                                {{$user->name}}
                        </a>
                        @endforeach
                        </p>
                        <p>状態：{{ $kazoku->status_label }}</p>
                        <p>ものがたり：{{ $kazoku->history }}</p>

                        <a href="{{ url("/kazoku/" . $kazoku->id . "/edit") }}" title="Edit post"><button class="btn btn-primary btn-xs">編集</button></a>
                                    <form method="POST" action="/kazoku/{{ $kazoku->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                        削除
                                                        </button>    
                                    </form>
                        
                </div>
                </div>
                @endforeach
        @endsection
    