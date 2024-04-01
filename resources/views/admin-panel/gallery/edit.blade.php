@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.gallery') }} | {{ __('main.edit') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.gallery.update', $gallery_item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.image') }}</label>
                            <input type="file" class="form-control" name="image" required>
                            <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP / MAXSIZE: 1MB</small>
                        </div>
                        @if ($gallery_item->image)
                            <div class='row border my-3 py-2 w-100 mx-auto'>
                                <div class="col-6 d-flex justify-content-start align-items-center">
                                    <img src="{{ asset('storage/uploads/gallery/' . $gallery_item->image) }}" width="100" height="100" alt='' style="object-fit: contain" />
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                    <a href="{{ asset('storage/uploads/gallery/' . $gallery_item->image) }}" data-fancybox="" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
