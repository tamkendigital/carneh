@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.region.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('region_create')
                    <a class="btn btn-indigo" href="{{ route('admin.regions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.region.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('region.index')

    </div>
</div>
@endsection