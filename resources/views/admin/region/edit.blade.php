@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.region.title_singular') }}:
                    {{ trans('cruds.region.fields.id') }}
                    {{ $region->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('region.edit', [$region])
        </div>
    </div>
</div>
@endsection