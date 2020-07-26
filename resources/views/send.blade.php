@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>送信履歴</h2>
            <!-- エラー処理 -->
            
    	@include('common.errors')


            
    @if (count($notes) > 0)
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
                @foreach ($notes as $note)
                    <tr>
                        <!-- 本タイトル -->
                        <td class="table-text">
                            <div>{{ $note->title }}</div>
                            <div>{{ $note->body }}</div>
                            <div><img src="upload/{{$note->photo}}" width="100"></div>
                        </td>
                         <!-- 本: 削除ボタン -->
                        <td>
                        <form action="{{ url('send/'.$note->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">
                                削除
                            </button>
                        </form>
                        </td>
                        <td>
                        <!-- 本: 更新ボタン -->
                        <td>
                            <form action="{{ url('send_edit/'.$note->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">
                            更新
                            </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<p>投稿がありません</p>
@endif


        </div>
    </div>
</div>
@endsection
