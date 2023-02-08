@extends('layouts.app')

@section('content')
<div class="container" style="direction: rtl;text-align: center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ورود به پنل') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(auth()->user()->type == 'sell')
                            <div >
                                <a href="{{ route('panel_sell') }}" ><button class="btn btn-primary">
                                        {{ __('ورود به پنل فروشنده') }}
                                    </button></a>
                            </div>
                    @endif
                    @if(auth()->user()->type == 'buy')
                        <div >
                            <a href="{{ route('panel_buy') }}" ><button class="btn btn-primary">
                                    {{ __('ورود به پنل خریدار') }}
                                </button></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
