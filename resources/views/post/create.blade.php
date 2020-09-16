@extends("layouts.app_sub")
        @section("content")
        <div class="main_content">
            <h2>Family NOTE</h2>
                <h3>ファミリーノート</h3>
        </div>



            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                <div class="card">

                                <div>
                    <button class="note_btn"><a href="/paint">絵を描く</a></button>
                </div>
                                <form method="POST" action="/post/store" class="form-horizontal" enctype='multipart/form-data'>
                                    {{ csrf_field() }}

                                    <div>
                                        <label for="title">タイトaaa</label>
                                            <input name="title" type="text" id="title" value="{{old('title')}}" placeholder="タイトル">
                                    </div>
                                    <div>
                                        <label for="body"></label>
                                            <textarea name="body" id="body" value="{{old('body')}}" rows="3"></textarea>
                                    </div>
                                    <div>
                                        <label for="user_id"></label>
                                            <input name="user_id" type="hidden" id="user_id" value="{{old('user_id')}}">
                                    </div>
                                    <div>
                                        <label for="photo">photo: </label>
                                            <input name="photo" type="file" id="photo" value="{{old('photo')}}">
                                    </div>
                                    <div>
                                    {{ Form::select('attribute_id', $client_id_loop,)}}
                                    
                                    </div>
       
                                    <div>
                                        <label for="sendtime">sendtime: </label>
                                            <input name="sendtime" type="datetime-local" id="sendtime" value="{{old('sendtime')}}">
                                    </div>
                                    <div>
                                            <input class="write_btn" type="submit" value="ノートをかく">
                                    </div>

                                    
                                         
                                </form>
                                
</div>

                                    


                </div>    

        @endsection
    