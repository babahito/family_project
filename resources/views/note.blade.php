@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>ノート投稿</h2>
            <!-- エラー処理 -->
            
    	@include('common.errors')
            <form enctype="multipart/form-data" action="{{url('note')}}" method="POST">
            {{ csrf_field() }}
                TITLE:<input type="text" name="title"><br>
                本文:<input type="text" name="body"><br>
                <!-- ユーザーID:<input type="text" name="user_id"> -->
                写真:<input type="file" name="photo"><br>
                属性:<input type="text" name="attribute">
                日時:<input type="datetime-local" name="toukou_time">
                <input type="submit">
            </form>
            
            {{-- @if (count($notes) === 0)--}}
            <!-- <p>投稿がありません</p>  -->
            {{--@elseif(count($notes) === 1) --}}
                <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped task-table">
                        <!-- テーブルヘッダ -->
                        <thead>
                            <th>ノート投稿一覧</th>
                            <th>&nbsp;</th>
                        </thead>
                        <!-- テーブル本体 -->
                        <tbody>
                                <tr>
                                    <!-- 本タイトル -->
                                    <td class="table-text">
                                        <div>{{ $note->title }}</div>
                                        <div>{{ $note->body }}</div>
                                        <div>{{ $note->toukou_time }}</div>
                                        <div><img src="upload/{{$note->photo}}" width="100"></div>
                                    </td>
                        <!-- 本: 削除ボタン -->
                                    <td>
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
@endsection
