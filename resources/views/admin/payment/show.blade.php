@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.payment.title_singular') }}:
                    {{ trans('cruds.payment.fields.id') }}
                    {{ $payment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.id') }}
                            </th>
                            <td>
                                {{ $payment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.user') }}
                            </th>
                            <td>
                                @if($payment->user)
                                    <span class="badge badge-relationship">{{ $payment->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.package') }}
                            </th>
                            <td>
                                @if($payment->package)
                                    <span class="badge badge-relationship">{{ $payment->package->package_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_amount') }}
                            </th>
                            <td>
                                @if($payment->paymentAmount)
                                    <span class="badge badge-relationship">{{ $payment->paymentAmount->price ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_date') }}
                            </th>
                            <td>
                                {{ $payment->payment_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_method') }}
                            </th>
                            <td>
                                {{ $payment->payment_method_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.transaction_number') }}
                            </th>
                            <td>
                                {{ $payment->transaction_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_status') }}
                            </th>
                            <td>
                                {{ $payment->payment_status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_edit')
                    <a href="{{ route('admin.payments.edit', $payment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection