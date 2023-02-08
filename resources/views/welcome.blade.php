@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: -50px">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" >
                <li class="nav-item dropdown" style="float: left;margin-left: 50px">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        مقطع تحصیلی
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/grade/دبستان">دبستان</a>
                        <a class="dropdown-item" href="/grade/راهنمایی">راهنمایی</a>
                        <a class="dropdown-item" href="/grade/دبیرستان">دبیرستان</a>
                    </div>
                </li>
                <li class="nav-item dropdown" style="float: left;margin-left: 50px">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        پایه تحصیلی
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/base/اول">اول</a>
                        <a class="dropdown-item" href="/base/دوم">دوم</a>
                        <a class="dropdown-item" href="/base/سوم">سوم</a>
                        <a class="dropdown-item" href="/base/چهارم">چهارم</a>
                        <a class="dropdown-item" href="/base/پنجم">پنجم</a>
                        <a class="dropdown-item" href="/base/شیشم">شیشم</a>
                        <a class="dropdown-item" href="/base/هفتم">هفتم</a>
                        <a class="dropdown-item" href="/base/هشتم">هشتم</a>
                        <a class="dropdown-item" href="/base/نهم">نهم</a>
                        <a class="dropdown-item" href="/base/دهم">دهم</a>
                        <a class="dropdown-item" href="/base/یازدهم">یازدهم</a>
                        <a class="dropdown-item" href="/base/دوازدهم">دوازدهم</a>
                    </div>
                </li>
                <li class="nav-item dropdown" style="float: left;margin-left: 50px">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        رشته
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/discipline/ریاضی">ریاضی</a>
                        <a class="dropdown-item" href="/discipline/تجربی">تجربی</a>
                        <a class="dropdown-item" href="/discipline/انسانی">انسانی</a>
                    </div>
                </li>
            </ul>
            <form action="/title" method="POST" class="form-inline my-2 my-lg-0" style="float: right;margin-right: 50px">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="جستجو" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @for($i = count($quiz)-1; $i >= 0; $i--)
                        <div class="card-header" style="text-align: center;">عنوان سوال : {{ $quiz[$i]->title }}</div>
                        <div class="card-body" style="text-align: right">
                            <p>مقطع تحصیلی : {{ $quiz[$i]->grade }}</p>
                            <p>پایه تحصیلی : {{ $quiz[$i]->base }}</p>
                            <p>رشته : {{ $quiz[$i]->discipline }}</p>
                            <p>سطح سوال : {{ $quiz[$i]->level }}</p>
                            <p>نوبت : {{ $quiz[$i]->turn }}</p>
                            <p>قیمت : {{ $quiz[$i]->price }}</p>
                            <p><a href="/question/{{ $quiz[$i]->id }}" class="btn btn-primary">ادامه توضیحات</a></p>
                            @if(count($quiz)-5 == $i)
                                @break
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
