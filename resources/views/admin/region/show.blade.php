@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.region.title_singular') }}:
                    {{ trans('cruds.region.fields.id') }}
                    {{ $region->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.region.fields.id') }}
                            </th>
                            <td>
                                {{ $region->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.region.fields.region_name') }}
                            </th>
                            <td>
                                {{ $region->region_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.region.fields.region_ios') }}
                            </th>
                            <td>
                                {{ $region->region_ios }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('region_edit')
                    <a href="{{ route('admin.regions.edit', $region) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.regions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection