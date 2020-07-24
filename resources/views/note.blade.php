@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>ノート投稿</h2>
            <form>
                TITLE:<input type="text" name="title">
                本文:<input type="text" name="body">
                <input type="submit">
            </form>
        </div>
    </div>
</div>
@endsection
