@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center">{{ __('ویرایش محصول') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/questions/' . $quiz->id . '/edit') }}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('عنوان') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $quiz->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="grade" class="col-md-4 col-form-label text-md-end">{{ __('مقطع تحصیلی') }}</label>

                                <div class="col-md-6">
                                    <select name="grade" id="grade" class="form-select">
                                        <option value="دبستان">دبستان</option>
                                        <option value="راهنمایی">راهنمایی</option>
                                        <option value="دبیرستان">دبیرستان</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="base" class="col-md-4 col-form-label text-md-end">{{ __('پایه تحصیلی') }}</label>

                                <div class="col-md-6">
                                    <select name="base" id="base" class="form-select">
                                        <option value="اول">اول</option>
                                        <option value="دوم">دوم</option>
                                        <option value="سوم">سوم</option>
                                        <option value="چهارم">چهارم</option>
                                        <option value="پنجم">پنجم</option>
                                        <option value="شیشم">شیشم</option>
                                        <option value="هفتم">هفتم</option>
                                        <option value="هشتم">هشتم</option>
                                        <option value="نهم">نهم</option>
                                        <option value="دهم">دهم</option>
                                        <option value="یازدهم">یازدهم</option>
                                        <option value="دوازدهم">دوازدهم</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="discipline" class="col-md-4 col-form-label text-md-end">{{ __('رشته') }}</label>

                                <div class="col-md-6">
                                    <select name="discipline" id="discipline" class="form-select">
                                        <option value="ریاضی">ریاضی</option>
                                        <option value="تجربی">تجربی</option>
                                        <option value="انسانی">انسانی</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('سطح سوال') }}</label>

                                <div class="col-md-6">
                                    <select name="level" id="level" class="form-select">
                                        <option value="آسان">آسان</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="سخت">سخت</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="turn" class="col-md-4 col-form-label text-md-end">{{ __('نوبت') }}</label>

                                <div class="col-md-6">
                                    <select name="turn" id="turn" class="form-select">
                                        <option value="دی">دی</option>
                                        <option value="خرداد">خرداد</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('قیمت ( تومان )') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $quiz->price }}" required autocomplete="price">

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('توضیحات') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="description"  name="description" rows="3">{{ $quiz->description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file1" class="col-md-4 col-form-label text-md-end">{{ __('فایل سوال') }}</label>

                                <div class="col-md-6">
                                    <input id="file1" type="file" class="form-control @error('file1') is-invalid @enderror" name="file1" value="{{ $quiz->file1_path }}" required autocomplete="file1">

                                    @error('file1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file2" class="col-md-4 col-form-label text-md-end">{{ __('نمونه ای از سوال ( یک عکس )') }}</label>

                                <div class="col-md-6">
                                    <input id="file2" type="file" class="form-control @error('file2') is-invalid @enderror" name="file2" value="{{ $quiz->file2_path }}" required autocomplete="file2">

                                    @error('file2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ویرایش') }}
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
