@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.identityVerification.title_singular') }}:
                    {{ trans('cruds.identityVerification.fields.id') }}
                    {{ $identityVerification->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('identity-verification.edit', [$identityVerification])
        </div>
    </div>
</div>
@endsection