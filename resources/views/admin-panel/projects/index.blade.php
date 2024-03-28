@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.projects') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-danger mb-2"><i
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
                        <th>{{ __('main.title') }}</th>
                        <th>{{ __('main.status') }}</th>
                        <th>{{ __('main.collected') }}</th>
                        <th>{{ __('main.goal') }}</th>
                        <th>{{ __('main.percent') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody id="sortable-tbody" data-route="{{ route('admin.projects.sort') }}">
                    @foreach ($projects as $project)
                        <tr data-id="{{ $project->id }}" data-order="{{ $project->order }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$project->getTranslate->where('lang', Session('lang'))->first()->title}}</td>
                            <td>{{$project->status === 0 ? __('main.active') : __('main.completed')}}</td>
                            <td>{{$project->current_amount }}</td>
                            <td>{{$project->final_amount }}</td>
                            <td>{{$project->percent }}</td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-success me-1">
                                        <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a class="btn btn-danger" href="{{ route('admin.projects.delete', $project->id) }}"
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
