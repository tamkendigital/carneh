@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.membershipType.title_singular') }}:
                    {{ trans('cruds.membershipType.fields.id') }}
                    {{ $membershipType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.membershipType.fields.id') }}
                            </th>
                            <td>
                                {{ $membershipType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipType.fields.membership_type') }}
                            </th>
                            <td>
                                {{ $membershipType->membership_type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('membership_type_edit')
                    <a href="{{ route('admin.membership-types.edit', $membershipType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.membership-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection