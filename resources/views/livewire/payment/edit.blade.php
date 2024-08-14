<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('payment.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.payment.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="payment.user_id" />
        <div class="validation-message">
            {{ $errors->first('payment.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.package_id') ? 'invalid' : '' }}">
        <label class="form-label" for="package">{{ trans('cruds.payment.fields.package') }}</label>
        <x-select-list class="form-control" id="package" name="package" :options="$this->listsForFields['package']" wire:model="payment.package_id" />
        <div class="validation-message">
            {{ $errors->first('payment.package_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.package_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_amount_id') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_amount">{{ trans('cruds.payment.fields.payment_amount') }}</label>
        <x-select-list class="form-control" id="payment_amount" name="payment_amount" :options="$this->listsForFields['payment_amount']" wire:model="payment.payment_amount_id" />
        <div class="validation-message">
            {{ $errors->first('payment.payment_amount_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_date') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
        <x-date-picker class="form-control" wire:model="payment.payment_date" id="payment_date" name="payment_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('payment.payment_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_method') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.payment.fields.payment_method') }}</label>
        <select class="form-control" wire:model="payment.payment_method">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['payment_method'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('payment.payment_method') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_method_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.transaction_number') ? 'invalid' : '' }}">
        <label class="form-label" for="transaction_number">{{ trans('cruds.payment.fields.transaction_number') }}</label>
        <input class="form-control" type="text" name="transaction_number" id="transaction_number" wire:model.defer="payment.transaction_number">
        <div class="validation-message">
            {{ $errors->first('payment.transaction_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.transaction_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.payment.fields.payment_status') }}</label>
        <select class="form-control" wire:model="payment.payment_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['payment_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('payment.payment_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>