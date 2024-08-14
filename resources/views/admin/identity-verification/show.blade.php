@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.identityVerification.title_singular') }}:
                    {{ trans('cruds.identityVerification.fields.id') }}
                    {{ $identityVerification->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.identityVerification.fields.id') }}
                            </th>
                            <td>
                                {{ $identityVerification->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.identityVerification.fields.verificationcode') }}
                            </th>
                            <td>
                                {{ $identityVerification->verificationcode }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.identityVerification.fields.user') }}
                            </th>
                            <td>
                                @if($identityVerification->user)
                                    <span class="badge badge-relationship">{{ $identityVerification->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.identityVerification.fields.national_n_opassport') }}
                            </th>
                            <td>
                                {{ $identityVerification->national_n_opassport }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.identityVerification.fields.verification_status') }}
                            </th>
                            <td>
                                {{ $identityVerification->verification_status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.identityVerification.fields.verification_date') }}
                            </th>
                            <td>
                                {{ $identityVerification->verification_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.identityVerification.fields.verified_by') }}
                            </th>
                            <td>
                                {{ $identityVerification->verified_by }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('identity_verification_edit')
                    <a href="{{ route('admin.identity-verifications.edit', $identityVerification) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.identity-verifications.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection