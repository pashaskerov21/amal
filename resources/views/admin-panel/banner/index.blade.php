@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.banner') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.banner.create') }}" class="btn btn-danger"><i
                                    class="mdi mdi-plus-circle me-2"></i> {{ __('main.add') }}</a>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{ __('main.image') }}</th>
                        <th>{{ __('main.page') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody id="sortable-tbody" data-route="{{ route('admin.banner.sort') }}">
                    @foreach ($banners as $banner)
                        <tr data-id="{{ $banner->id }}" data-order="{{ $banner->order }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <div class="image-td">
                                    <img src="{{ asset('storage/uploads/banner/' . $banner->image) }}" alt="">
                                </div>
                            </td>
                            <td>
                                @if ($banner->page == 0)
                                    {{ __('main.home') }}
                                @else
                                    {{ $banner->getPage->where('lang', Session('lang'))->first()->title }}
                                @endif
                            </td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-success me-1">
                                        <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a class="btn btn-danger" href="{{ route('admin.banner.delete', $banner->id) }}"
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
