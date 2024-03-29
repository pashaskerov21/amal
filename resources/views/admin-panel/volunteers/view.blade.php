@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.volunteers') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.ad_soyad') }}</label>
                        <input type="text" class="form-control" value="{{ $volunteer->fullname }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.phone') }}</label>
                        <input type="text" class="form-control" value="{{ $volunteer->phone }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.email') }}</label>
                        <input type="text" class="form-control" value="{{ $volunteer->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.birthday') }}</label>
                        <input type="text" class="form-control" value="{{ $volunteer->birthday }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.gender') }}</label>
                        @if ($volunteer->gender === 'male')
                            <input type="text" class="form-control" value="{{ __('main.male') }}" readonly>
                        @elseif($volunteer->gender === 'female')
                            <input type="text" class="form-control" value="{{ __('main.female') }}" readonly>
                        @else
                            <input type="text" class="form-control" value="-" readonly>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('main.note') }}</label>
                        <textarea class="form-control" readonly>{{ $volunteer->note }}</textarea>
                    </div>
                    @if ($volunteer->image)
                        <div class='row border my-3 py-2 w-100 mx-auto'>
                            <div class="col-6 d-flex justify-content-start align-items-center">
                                <img src="{{ asset('storage/uploads/volunteers/' . $volunteer->image) }}" width="100"
                                    height="100" alt='' style="object-fit: contain" />
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <a href="{{ asset('storage/uploads/volunteers/' . $volunteer->image) }}" data-fancybox=""
                                    class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
