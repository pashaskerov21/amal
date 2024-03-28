@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.projects') }} | {{ __('main.edit') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($project->getTranslate as $index => $translate)
                                <li class="nav-item">
                                    <a href="#tab_{{ $translate->lang }}" data-bs-toggle="tab" class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <span>{{ $translate->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($project->getTranslate as $index => $translate)
                                <input type="hidden" name="lang[]" value="{{ $translate->lang }}">
                                <div class="tab-pane show @if ($index == 0) active @endif"
                                    id="tab_{{ $translate->lang }}">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.title') }} {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{ $translate->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.date') }} {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="date[]" value="{{ $translate->date }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.place') }} {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="location[]" value="{{ $translate->location }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.category') }} {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="category[]" value="{{ $translate->category }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.card_text') }} {{ $translate->lang }}</label>
                                        <textarea class="form-control" name="card_text[]">{{ $translate->card_text }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.meta_description') }} {{ $translate->lang }}</label>
                                        <textarea class="form-control" name="meta_description[]">{{ $translate->meta_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.main_text') }} {{ $translate->lang }}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $translate->main_text !!}</div>
                                        <textarea name="main_text[]" hidden></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.collected') }}</label>
                            <input type="number" class="form-control" name="current_amount" required value="{{$project->current_amount}}" step="any">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.goal') }}</label>
                            <input type="number" class="form-control" name="final_amount" required value="{{$project->final_amount}}" step="any">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.card_image') }}</label>
                            <input type="file" class="form-control" name="card_image">
                            <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP</small>
                        </div>
                        @if ($project->card_image)
                            <div class='row border my-3 py-2 w-100 mx-auto'>
                                <div class="col-6 d-flex justify-content-start align-items-center">
                                    <img src="{{ asset('storage/uploads/projects/' . $project->card_image) }}" width="100" height="100" alt='' style="object-fit: contain" />
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                    <a href="{{ asset('storage/uploads/projects/' . $project->card_image) }}" data-fancybox="" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.banner_image') }}</label>
                            <input type="file" class="form-control" name="banner_image">
                            <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP</small>
                        </div>
                        @if ($project->banner_image)
                            <div class='row border my-3 py-2 w-100 mx-auto'>
                                <div class="col-6 d-flex justify-content-start align-items-center">
                                    <img src="{{ asset('storage/uploads/projects/' . $project->banner_image) }}" width="100" height="100" alt='' style="object-fit: contain" />
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                    <a href="{{ asset('storage/uploads/projects/' . $project->banner_image) }}" data-fancybox="" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.gallery') }}</label>
                            <input type="file" class="form-control" name="gallery[]" multiple>
                            <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP</small>
                        </div>
                        <table class="table table-striped table-centered mb-0">
                            <tbody id="sortable-tbody" data-route="{{ route('admin.projects.gallery_sort') }}">
                                @foreach ($project->getGallery as $gallery_item)
                                    <tr data-id="{{ $gallery_item->id }}" data-order="{{ $gallery_item->order }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <div class="image-td">
                                                <img src="{{ asset('storage/uploads/projects/gallery/' . $gallery_item->image) }}" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-action">
                                                <a href="{{ asset('storage/uploads/projects/gallery/' . $gallery_item->image) }}" class="btn btn-primary me-1" data-fancybox="">
                                                    <i class="fa-solid fa-eye"></i></a>
                                                <a class="btn btn-danger" href="{{ route('admin.projects.gallery_delete', $gallery_item->id) }}"
                                                    onclick="return confirmDelete(event, this.href)">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary"><i class="ri-drag-move-2-line"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
