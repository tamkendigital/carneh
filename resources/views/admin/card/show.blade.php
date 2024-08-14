@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.card.title_singular') }}:
                    {{ trans('cruds.card.fields.id') }}
                    {{ $card->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.card.fields.id') }}
                            </th>
                            <td>
                                {{ $card->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.card.fields.user') }}
                            </th>
                            <td>
                                @if($card->user)
                                    <span class="badge badge-relationship">{{ $card->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.card.fields.card_number') }}
                            </th>
                            <td>
                                {{ $card->card_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.card.fields.issue_date') }}
                            </th>
                            <td>
                                {{ $card->issue_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.card.fields.expiry_date') }}
                            </th>
                            <td>
                                {{ $card->expiry_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.card.fields.association') }}
                            </th>
                            <td>
                                @if($card->association)
                                    <span class="badge badge-relationship">{{ $card->association->association_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('card_edit')
                    <a href="{{ route('admin.cards.edit', $card) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.cards.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection