@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.associationType.title_singular') }}:
                    {{ trans('cruds.associationType.fields.id') }}
                    {{ $associationType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('association-type.edit', [$associationType])
        </div>
    </div>
</div>
@endsection