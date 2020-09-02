
        @extends("layouts.app")
        @section("content")
        <div class="main_content">
            <h2>Family NOTE</h2>
                <h3>ファミリーノート</h3>
        </div>

        
        <my-input></my-input>



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
                                <form method="POST" action="/post/store" class="form-horizontal" enctype='multipart/form-data'>
                                    {{ csrf_field() }}

                                    <div>
                                        <label for="title">タイトル</label>
                                            <input name="tle" type="text" id="title" value="{{old('title')}}" placeholder="タイトル">
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
                                        <label for="attribute_id">attribute_id: </label>
                                            <input required="required" name="attribute_id" type="text" id="attribute_id" value="{{old('attribute_id')}}">
                                    </div>
                                    <div>
                                        <label for="status">status: </label>
                                            <input required="required" name="status" type="text" id="status" value="{{old('status')}}">
                                    </div>
                                    <div>
                                        <label for="sendtime">sendtime: </label>
                                            <input required="required" name="sendtime" type="date" id="sendtime" value="{{old('sendtime')}}">
                                    </div>
                                    <div>
                                            <input class="write_btn" type="submit" value="ノートをかく">
                                    </div>     
                                </form>
                                
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    