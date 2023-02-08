@extends('layouts.app')

@section('content')
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
                        <img src="{{ $quiz->file2_path }}" width="700px" ><br><br>
                        <p><a href="{{ $quiz->file1_path }}" class="btn btn-primary">دانلود فایل</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
