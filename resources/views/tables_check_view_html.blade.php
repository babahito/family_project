
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tables</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
</head>

<body>
<h1>Tables</h1>
    <div class="container-fluid">
        <div class="row">
            
                


                <!-- table[Start] --><div class="col-md-3"><h2 class="info">users</h2><h5>[ ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id');
</td><td></td></tr><tr><td>2</td><td>string('name');
</td><td></td></tr><tr><td>3</td><td>string('email');
</td><td></td></tr><tr><td>4</td><td>string('password');
</td><td></td></tr><tr><td>5</td><td>timestamps();
</td><td></td></tr><tr><td>6</td><td>softDeletes();
</td><td></td></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">attributes</h2><h5>[家族続柄 ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('user_id')->nullable()->unsigned();
</td><td></td></tr><tr><td>3</td><td>string('attribute_name')->nullable();
</td><td></td></tr><tr><td>4</td><td>timestamps();
</td><td></td></tr><tr><td>5</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("user_id")<span class="text-danger">->references("id")->on("users");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">user_details</h2><h5>[ユーザー詳細 ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('user_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>string('photo')->nullable();
</td><td></td></tr><tr><td>4</td><td>date('birthday')->nullable();
</td><td></td></tr><tr><td>5</td><td>timestamps();
</td><td></td></tr><tr><td>6</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("user_id")<span class="text-danger">->references("id")->on("users");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">kazokus</h2><h5>[家族情報（必須ではない） ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('follower_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>string('followee_id')->unsigned();
</td><td></td></tr><tr><td>4</td><td>string('photo');
</td><td></td></tr><tr><td>5</td><td>string('family_name');
</td><td></td></tr><tr><td>6</td><td>date('family_date');
</td><td></td></tr><tr><td>7</td><td>timestamps();
</td><td></td></tr><tr><td>8</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("follower_id")<span class="text-danger">->references("id")->on("follows");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">follows</h2><h5>[users中間テーブル ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id');
</td><td></td></tr><tr><td>2</td><td>integer('follower_id')->nullable();
</td><td></td></tr><tr><td>3</td><td>integer('followee_id')->nullable();
</td><td></td></tr><tr><td>4</td><td>timestamps();
</td><td></td></tr><tr><td>5</td><td>softDeletes();
</td><td></td></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">bookmarks</h2><h5>[お気に入り ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('user_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>integer('post_id')->unsigned();
</td><td></td></tr><tr><td>4</td><td>timestamps();
</td><td></td></tr><tr><td>5</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("user_id")<span class="text-danger">->references("id")->on("users");</span>
</td></tr></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("post_id")<span class="text-danger">->references("id")->on("posts");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">posts</h2><h5>[投稿NOTE ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>string('title')->nullable();
</td><td></td></tr><tr><td>3</td><td>text('body')->nullable();
</td><td></td></tr><tr><td>4</td><td>integer('user_id')->nullable()->unsigned();
</td><td></td></tr><tr><td>5</td><td>string('photo')->nullable();
</td><td></td></tr><tr><td>6</td><td>timestamps();
</td><td></td></tr><tr><td>7</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("user_id")<span class="text-danger">->references("id")->on("users");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">likes</h2><h5>[いいねボタン ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('user_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>integer('post_id')->unsigned();
</td><td></td></tr><tr><td>4</td><td>timestamps();
</td><td></td></tr><tr><td>5</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("user_id")<span class="text-danger">->references("id")->on("users");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">posts_tags</h2><h5>[NOTE投稿とtagの中間テーブル ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('post_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>integer('tag_id')->unsigned();
</td><td></td></tr><tr><td>4</td><td>timestamps();
</td><td></td></tr><tr><td>5</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("id")<span class="text-danger">->references("id")->on("posts");</span>
</td></tr></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("tag_id")<span class="text-danger">->references("id")->on("tags");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">tags</h2><h5>[タグ ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id');
</td><td></td></tr><tr><td>2</td><td>string('name');
</td><td></td></tr><tr><td>3</td><td>timestamps();
</td><td></td></tr><tr><td>4</td><td>softDeletes();
</td><td></td></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">post_hists</h2><h5>[投稿下書き保存 ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('post_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>integer('rev_id')->unsigned();
</td><td></td></tr><tr><td>4</td><td>string('title');
</td><td></td></tr><tr><td>5</td><td>text('body');
</td><td></td></tr><tr><td>6</td><td>string('photo')->nullable();
</td><td></td></tr><tr><td>7</td><td>timestamps();
</td><td></td></tr><tr><td>8</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("post_id")<span class="text-danger">->references("id")->on("posts");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">mail_sends</h2><h5>[メール送信履歴 ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>bigIncrements('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('user_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>integer('send_user_id')->unsigned();
</td><td></td></tr><tr><td>4</td><td>integer('post_id')->unsigned();
</td><td></td></tr><tr><td>5</td><td>date('send_day');
</td><td></td></tr><tr><td>6</td><td>timestamps();
</td><td></td></tr><tr><td>7</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("user_id")<span class="text-danger">->references("id")->on("users");</span>
</td></tr></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("post_id")<span class="text-danger">->references("id")->on("posts");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --><div class="col-md-3"><h2 class="info">mail_receiveds</h2><h5>[メール受信履歴 ]</h5><div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr class="bg-primary text-white">
                                <th>-</th>
                                <th>Name(Type Size)</th>
                                <th>Comment</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- TR --><tr><td>1</td><td>increments('id')->unsigned();
</td><td></td></tr><tr><td>2</td><td>integer('user_id')->unsigned();
</td><td></td></tr><tr><td>3</td><td>integer('received_user_id')->unsigned();
</td><td></td></tr><tr><td>4</td><td>integer('post_id')->unsigned();
</td><td></td></tr><tr><td>5</td><td>date('received_day');
</td><td></td></tr><tr><td>6</td><td>integer('received_life');
</td><td></td></tr><tr><td>7</td><td>timestamps();
</td><td></td></tr><tr><td>8</td><td>softDeletes();
</td><td></td></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("user_id")<span class="text-danger">->references("id")->on("users");</span>
</td></tr></tr><tr><td class="bg-secondary text-white">FK</td><td colspan="2">//$table->foreign("post_id")<span class="text-danger">->references("id")->on("posts");</span>
</td></tr></tr><!-- TR -->
                            </tbody>

                        </table>
                    </div>
                     </div>
                    <!-- table[end] --> </main>
        </div>
    </div>
</body>

</html>
