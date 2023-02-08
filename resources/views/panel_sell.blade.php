@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert" style="width: 300px;margin: 10px auto;text-align: center;direction: rtl">
            {{ session('success') }}
        </div>
    @endif
    <div class="container" style="direction: rtl;text-align: center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('پنل فروشنده') }}</div>
                    <div class="card-body">
                        <div >
                            <a href="{{ route('createquiz') }}" ><button class="btn btn-primary">
                                    {{ __('افزودن سوال') }}
                                </button></a>
                        </div>
                        <br>
                        <div >
                            <a href="{{ route('bank_info') }}" ><button class="btn btn-primary">
                                    {{ __('تصویه حساب') }}
                                </button></a>
                        </div>
                        <hr>
                        <p style="text-align: right" class="alert alert-light">لیست سولات:</p>

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
                                            <a href="{{ url('/questions/' . $quizs[$i]->id) }}"><button class="btn btn-info btn-sm">نمایش</button></a>
                                            <a href="{{ url('/questions/' . $quizs[$i]->id . '/edit') }}" ><button class="btn btn-primary btn-sm">ویرایش</button></a>
                                            <form method="POST" action="{{ url('/questions' . '/' . $quizs[$i]->id) }}"  style="display:inline">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                            </form>
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
