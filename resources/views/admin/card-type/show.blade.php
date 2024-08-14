@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.cardType.title_singular') }}:
                    {{ trans('cruds.cardType.fields.id') }}
                    {{ $cardType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.cardType.fields.id') }}
                            </th>
                            <td>
                                {{ $cardType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cardType.fields.card_type') }}
                            </th>
                            <td>
                                {{ $cardType->card_type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('card_type_edit')
                    <a href="{{ route('admin.card-types.edit', $cardType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.card-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection