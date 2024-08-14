@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.associationType.title_singular') }}:
                    {{ trans('cruds.associationType.fields.id') }}
                    {{ $associationType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.associationType.fields.id') }}
                            </th>
                            <td>
                                {{ $associationType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.associationType.fields.association_type') }}
                            </th>
                            <td>
                                {{ $associationType->association_type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('association_type_edit')
                    <a href="{{ route('admin.association-types.edit', $associationType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.association-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection