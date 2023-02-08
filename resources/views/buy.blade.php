@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert" style="width: 300px;margin: 10px auto;text-align: center;direction: rtl">
            {{ session('success') }}
        </div>
    @endif
    @if(!($amount_buy >= $quiz->price))
        <div role="alert" style="width: 500px;margin: 30px auto;text-align: center;direction: rtl">
            <p><a href="/bank" class="alert alert-danger" style="text-decoration: none">موجودی برای خرید کافی نیست برای شارژ کلیک کنید</a></p>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center;">خرید سوال</div>
                    <div class="card-body" style="text-align: right">
                        <form method="POST" action="/buy/{{ $quiz->id }}">
                            @csrf

                            <p>عنوان سوال : {{ $quiz->title }}</p>
                            <p>قیمت سوال : {{ $quiz->price }}</p>
                            <p>موجودی کیف پول : {{ $amount_buy }}</p>

                            <div class="row mb-0" style="text-align: center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('تایید و خرید') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
