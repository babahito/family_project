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
                        </td>
            <!-- 本: 削除ボタン -->
                        <td>
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
