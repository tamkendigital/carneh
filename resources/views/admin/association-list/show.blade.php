@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.associationList.title_singular') }}:
                    {{ trans('cruds.associationList.fields.id') }}
                    {{ $associationList->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.associationList.fields.id') }}
                            </th>
                            <td>
                                {{ $associationList->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.associationList.fields.association_name') }}
                            </th>
                            <td>
                                {{ $associationList->association_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.associationList.fields.association_type') }}
                            </th>
                            <td>
                                @if($associationList->associationType)
                                    <span class="badge badge-relationship">{{ $associationList->associationType->association_type ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.associationList.fields.association_logo') }}
                            </th>
                            <td>
                                @foreach($associationList->association_logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.associationList.fields.association_address') }}
                            </th>
                            <td>
                                {{ $associationList->association_address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.associationList.fields.website') }}
                            </th>
                            <td>
                                {{ $associationList->website }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('association_list_edit')
                    <a href="{{ route('admin.association-lists.edit', $associationList) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.association-lists.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection