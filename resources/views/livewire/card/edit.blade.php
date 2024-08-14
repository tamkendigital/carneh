<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('card.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.card.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="card.user_id" />
        <div class="validation-message">
            {{ $errors->first('card.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.card.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('card.card_number') ? 'invalid' : '' }}">
        <label class="form-label" for="card_number">{{ trans('cruds.card.fields.card_number') }}</label>
        <input class="form-control" type="number" name="card_number" id="card_number" wire:model.defer="card.card_number" step="1">
        <div class="validation-message">
            {{ $errors->first('card.card_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.card.fields.card_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('card.issue_date') ? 'invalid' : '' }}">
        <label class="form-label" for="issue_date">{{ trans('cruds.card.fields.issue_date') }}</label>
        <x-date-picker class="form-control" wire:model="card.issue_date" id="issue_date" name="issue_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('card.issue_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.card.fields.issue_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('card.expiry_date') ? 'invalid' : '' }}">
        <label class="form-label" for="expiry_date">{{ trans('cruds.card.fields.expiry_date') }}</label>
        <x-date-picker class="form-control" wire:model="card.expiry_date" id="expiry_date" name="expiry_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('card.expiry_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.card.fields.expiry_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('card.association_id') ? 'invalid' : '' }}">
        <label class="form-label" for="association">{{ trans('cruds.card.fields.association') }}</label>
        <x-select-list class="form-control" id="association" name="association" :options="$this->listsForFields['association']" wire:model="card.association_id" />
        <div class="validation-message">
            {{ $errors->first('card.association_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.card.fields.association_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.cards.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>