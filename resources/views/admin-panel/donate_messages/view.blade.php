@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.donate_messages') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.ad_soyad') }}</label>
                        <input type="text" class="form-control" value="{{ $message->fullname }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.phone') }}</label>
                        <input type="text" class="form-control" value="{{ $message->phone }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.email') }}</label>
                        <input type="text" class="form-control" value="{{ $message->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.service') }}</label>
                        <input type="text" class="form-control" value="{{ $message->getService->where('lang', Session('lang'))->first()->title }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.amount') }}</label>
                        <input type="text" class="form-control" value="{{ $message->amount }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.note') }}</label>
                        <textarea class="form-control" readonly>{{ $message->note }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
