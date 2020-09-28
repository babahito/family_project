@extends("layouts.app")
@section("content")


            <div class="resizeimage main_image">
                
                    <img src="{{ asset('/assets/images/main_small.png') }}" class="miniimage" alt="メイン画像">
                    <img src="{{ asset('/assets/images/main.png') }}" class="bigimage" alt="メイン画像">
                
            </div>


    <main> 
        <h2 style="text-align:center;">CONCEPT</h2>
            <div class="concept_title"> 
                恥ずかしくていつも言えない。<br>けど、大切な家族。<br>みらいの家族にメッセージを送って、ちょっと幸せにしたい
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 mb-2">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/assets/images/concept_01.png') }}" alt="FamilyNote1">
                        <div class="card-body">
                            <h4 class="card-title">ママから娘へ</h4>
                            <p style="text-align:right;">2020.1.10</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6 mb-2">
                        <div class="card">
                        <img class="card-img-top" src="{{ asset('/assets/images/concept_02.png') }}" alt="FamilyNOTE2">
                        <div class="card-body">
                            <h4 class="card-title">パパから息子へ</h4>
                            <p style="text-align:right;">2020.10.10</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6 mb-2">
                        <div class="card">
                        <img class="card-img-top" src="{{ asset('/assets/images/concept_03.png') }}" alt="FamilyNOTE3">
                        <div class="card-body">
                            <h4 class="card-title">おじいちゃんから</h4>
                            <p style="text-align:right;">2020.5.10</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6 mb-2">
                        <div class="card">
                        <img class="card-img-top" src="{{ asset('/assets/images/concept_03.png') }}" alt="FamilyNOTE3">
                        <div class="card-body">
                            <h4 class="card-title">おじいちゃんから</h4>
                            <p style="text-align:right;">2020.5.10</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    @endsection
    