@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.membershipType.title_singular') }}:
                    {{ trans('cruds.membershipType.fields.id') }}
                    {{ $membershipType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('membership-type.edit', [$membershipType])
        </div>
    </div>
</div>
@endsection