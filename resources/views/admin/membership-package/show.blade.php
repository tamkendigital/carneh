@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.membershipPackage.title_singular') }}:
                    {{ trans('cruds.membershipPackage.fields.id') }}
                    {{ $membershipPackage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.id') }}
                            </th>
                            <td>
                                {{ $membershipPackage->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.package_name') }}
                            </th>
                            <td>
                                {{ $membershipPackage->package_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.membership_type') }}
                            </th>
                            <td>
                                @foreach($membershipPackage->membershipType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->membership_type }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.card_type') }}
                            </th>
                            <td>
                                @foreach($membershipPackage->cardType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->card_type }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.price') }}
                            </th>
                            <td>
                                {{ $membershipPackage->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.description') }}
                            </th>
                            <td>
                                {{ $membershipPackage->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.duration') }}
                            </th>
                            <td>
                                {{ $membershipPackage->duration }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.is_renewable') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $membershipPackage->is_renewable ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershipPackage.fields.is_active') }}
                            </th>
                            <td>
                                {{ $membershipPackage->is_active_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('membership_package_edit')
                    <a href="{{ route('admin.membership-packages.edit', $membershipPackage) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.membership-packages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection