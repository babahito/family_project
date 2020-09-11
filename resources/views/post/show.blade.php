@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{Auth::user()->name}}さん</div>
                            <div class="panel-body">

                                <!-- <a href="{{-- url("post") --}}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{-- url("post") ."/". $posts->id . "/edit" --}}" title="Edit post"><button class="btn btn-primary btn-xs">Edit</button></a> -->
                                <!-- <form method="POST" action="/post/{{ $posts->id }}" class="form-horizontal" style="display:inline;">
                                        {{-- csrf_field() --}}
                                        {{-- method_field("delete") --}}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                        Delete
                                        </button>    
                            </form> -->
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>


                                            <p><img src="{{ asset('storage/' . $posts->photo) }}" width="100px"></p>
                                            <p>タイトルaa:{{$posts->title}}</p>
                                            <p>送信者:{{$posts->user->name}}</p>
                                            <p>本文:{{$posts->body}}</p>
                                            <!-- <p>送信相手:{{--$posts->attribute_id--}}</p> -->
                                            <p>送信日時:{{$posts->sendtime}}</p>
                                            
                                            

                                          
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    