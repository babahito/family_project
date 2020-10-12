@extends("layouts.app_sub")
@section("content")


<main>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>


                <div class="card-body text-center">
                    <form method="POST" action="{{ route('deactive') }}">
                        @csrf
                        <h2>{{ __('このアカウントはご利用できなくなります') }}</h2>
                        <p>{{ __('よろしければ、ボタンをclickしてください') }}</p>
                        <button type="submit" class="btn btn-primary">
                            {{ __('退会する') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection