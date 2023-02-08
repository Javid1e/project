@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @for($i = 0; $i < count($quiz); $i++)
                        <div class="card-header" style="text-align: center;">عنوان سوال : {{ $quiz[$i]->title }}</div>
                        <div class="card-body" style="text-align: right">
                            <p>مقطع تحصیلی : {{ $quiz[$i]->grade }}</p>
                            <p>پایه تحصیلی : {{ $quiz[$i]->base }}</p>
                            <p>رشته : {{ $quiz[$i]->discipline }}</p>
                            <p>سطح سوال : {{ $quiz[$i]->level }}</p>
                            <p>نوبت : {{ $quiz[$i]->turn }}</p>
                            <p>توضیحات : {{ $quiz[$i]->description }}</p>
                            <p>قیمت : {{ $quiz[$i]->price }}</p>
                            <img src="{{ $quiz[$i]->file2_path }}" width="700px"><br><br>
                            @guest
                                <div class="alert alert-danger" role="alert" style="width: 500px;margin: 10px auto;text-align: center;direction: rtl">
                                    <p>برای خرید سوال باید ثبت نام کنید یا وارد حساب کاربری خود شوید</p>
                                </div>
                            @endguest
                            @auth
                                @if($user->type == 'buy')
                                    <p style="text-align: center;margin: 0 auto" ><a href="/buy/{{ $quiz[$i]->id }}" class="btn btn-primary">خرید سوال</a></p>
                                @endif
                            @endauth
                            <br><br>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
