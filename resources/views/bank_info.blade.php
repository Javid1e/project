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
                    <div class="card-header" style="text-align: center;">{{ __('تصویه حساب') }}</div>

                    <div class="alert alert-primary" role="alert" style="text-align: center;margin: 10px auto;width: 300px;height: 60px;">
                        <p>مبلغ قابل برداشت <span>{{ $amount->amount }}</span> تومان میباشد</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bank_info') }}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")

                            <div class="row mb-3">
                                <label for="card" class="col-md-4 col-form-label text-md-end">{{ __('شماره کارت') }}</label>

                                <div class="col-md-6">
                                    <input id="card" type="text" class="form-control @error('card') is-invalid @enderror" name="card" value="{{ old('card') }}" required autocomplete="card" autofocus>

                                    @error('card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('مبلغ برداشت') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount">

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('برداشت') }}
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
