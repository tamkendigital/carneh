@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.inquiry.title_singular') }}:
                    {{ trans('cruds.inquiry.fields.id') }}
                    {{ $inquiry->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.id') }}
                            </th>
                            <td>
                                {{ $inquiry->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.inquiriesnumber') }}
                            </th>
                            <td>
                                {{ $inquiry->inquiriesnumber }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.user') }}
                            </th>
                            <td>
                                @if($inquiry->user)
                                    <span class="badge badge-relationship">{{ $inquiry->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.association') }}
                            </th>
                            <td>
                                @if($inquiry->association)
                                    <span class="badge badge-relationship">{{ $inquiry->association->association_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.request_type') }}
                            </th>
                            <td>
                                {{ $inquiry->request_type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.status') }}
                            </th>
                            <td>
                                {{ $inquiry->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.submission_date') }}
                            </th>
                            <td>
                                {{ $inquiry->submission_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inquiry.fields.approval_date') }}
                            </th>
                            <td>
                                {{ $inquiry->approval_date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('inquiry_edit')
                    <a href="{{ route('admin.inquiries.edit', $inquiry) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection