@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.about') }} | {{ __('main.texts') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.about_text.create') }}" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> {{ __('main.add') }}</a>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{ __('main.image') }}</th>
                        <th>{{ __('main.title') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody id="sortable-tbody" data-route="{{ route('admin.about_text.sort') }}">
                    @foreach ($about_texts as $about_text)
                        <tr data-id="{{ $about_text->id }}" data-order="{{ $about_text->order }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <div class="image-td">
                                    <img src="{{ asset('storage/uploads/about_text/' . $about_text->image) }}" alt="">
                                </div>
                            </td>
                            <td>
                                {{ $about_text->getTranslate->where('lang', Session('lang'))->first()->title }}
                            </td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.about_text.edit', $about_text->id) }}" class="btn btn-success me-1">
                                        <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a class="btn btn-danger" href="{{ route('admin.about_text.delete', $about_text->id) }}"
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
    </div>
@endsection
