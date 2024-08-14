@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.membershipPackage.title_singular') }}:
                    {{ trans('cruds.membershipPackage.fields.id') }}
                    {{ $membershipPackage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('membership-package.edit', [$membershipPackage])
        </div>
    </div>
</div>
@endsection