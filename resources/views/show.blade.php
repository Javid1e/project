@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-danger" role="alert" style="width: 500px;margin: 10px auto;text-align: center;direction: rtl">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center;">عنوان سوال : {{ $quiz->title }}</div>
                    <div class="card-body" style="text-align: right">
                        <p>مقطع تحصیلی : {{ $quiz->grade }}</p>
                        <p>پایه تحصیلی : {{ $quiz->base }}</p>
                        <p>رشته : {{ $quiz->discipline }}</p>
                        <p>سطح سوال : {{ $quiz->level }}</p>
                        <p>نوبت : {{ $quiz->turn }}</p>
                        <p>توضیحات : {{ $quiz->description }}</p>
                        <p>قیمت : {{ $quiz->price }}</p>
                        <img src="{{ $quiz->file2_path }}" width="700px" ><br><br><br><br>
                        @guest
                            <div class="alert alert-danger" role="alert" style="width: 500px;margin: 10px auto;text-align: center;direction: rtl">
                                <p>برای خرید سوال باید ثبت نام کنید یا وارد حساب کاربری خود شوید</p>
                            </div>
                        @endguest
                        @auth
                            @if($user->type == 'buy')
                                <p style="text-align: center;margin: 0 auto" ><a href="/buy/{{ $quiz->id }}" class="btn btn-primary">خرید سوال</a></p>
                            @endif
                        @endauth
                        <br><br>
                    </div >
                    <div style="text-align: right;margin-right: 30px">
                        <h4> : لیست نظرات</h4>
                        @foreach($comments as $comment)
                            <div class="border border-primary" style="margin: 10px;padding: 10px">
                                <h5> نام و نام خانوادگی : {{ $comment->name }}</h5>
                                <h6>{{ $comment->comment }}</h6>
                            </div>
                        @endforeach

                    </div>
                    <br><br>
                    <form action="/question/{{ $quiz->id }}" method="post" style="text-align: right" class="border border-primary">
                        @csrf
                        <br><br>
                        <div class="mb-3">
                            <label class="form-label" style="margin-right: 50px"> : نام و نام خانوادگی</label>
                            <input type="text" class="form-control" name="name" style="width: 650px;margin-left: 40px" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="margin-right: 50px"> : متن نظر</label>
                            <textarea class="form-control" name="comment" rows="6" style="width: 650px;margin-left: 40px" required></textarea>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4" >
                                <button type="submit" class="btn btn-primary" style="margin-right: -60px">
                                    {{ __('ثبت نظر') }}
                                </button>
                            </div>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
