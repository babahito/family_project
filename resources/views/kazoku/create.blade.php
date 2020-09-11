@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">家族つくります</div>
                            <div class="panel-body">
                                
                                <br />
                                <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/kazoku/store" class="form-horizontal" enctype='multipart/form-data'>
                                    {{ csrf_field() }}

                                    <div>
                                        <label for="f_name">家族グループ名</label>
                                            <input name="family_name" type="text" id="f_name" value="{{old('family_name')}}" placeholder="家族名">
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
                                        <label for="f_date">家族誕生日: </label>
                                        <input name="family_date" type="date" id="f_date" value="{{old('family_date')}}">
                                    </div>
                                    <div>
                                        <label for="f_history">家族ものがたり</label>
                                        <textarea name="history" id="f_history" value="{{old('history')}}" rows="3"></textarea>
                                            
                                    </div>
                                    <div>
                                        <select name="status">
                                            <option value="0">非公開</option>
                                            <option value="1">公開</option>
                                        </select>
                                    </div>
                                    <div>
                                            <input class="write_btn" type="submit" value="家族をつくる">
                                    </div>

                                    
                                         
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    