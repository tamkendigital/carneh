@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.associationList.title_singular') }}:
                    {{ trans('cruds.associationList.fields.id') }}
                    {{ $associationList->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('association-list.edit', [$associationList])
        </div>
    </div>
</div>
@endsection