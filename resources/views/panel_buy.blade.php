@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert" style="width: 500px;margin: 10px auto;text-align: center;direction: rtl">
            {{ session('success') }}
        </div>
    @endif
    <div class="alert alert-primary" role="alert" style="text-align: center;margin: 10px auto;width: 250px;height: 60px;">
        <p>موجودی کیف پول :  <span>{{ $amount->amount }}</span> تومان</p>
    </div>
    <div class="container" style="direction: rtl;text-align: center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('پنل خریدار') }}</div>
                    <div class="card-body">
                        <div >
                            <a href="/bank" ><button class="btn btn-primary">
                                    {{ __('شارژ کیف پول') }}
                                </button></a>
                        </div>
                        <hr>
                        <p style="text-align: right" class="alert alert-light">تاریخچه خرید:</p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>مقطع تحصیلی</th>
                                    <th>پایه</th>
                                    <th>قیمت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < count($quizs); $i++)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $quizs[$i]->title }}</td>
                                        <td>{{ $quizs[$i]->grade }}</td>
                                        <td>{{ $quizs[$i]->base }}</td>
                                        <td>{{ $quizs[$i]->price }}</td>
                                        <td>
                                            <a href="{{ url('/question/' . $quizs[$i]->id) }}"><button class="btn btn-info btn-sm">نمایش</button></a>
                                            <a href="{{ $quizs[$i]->file1_path }}" ><button class="btn btn-primary btn-sm">دانلود فایل</button></a>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

