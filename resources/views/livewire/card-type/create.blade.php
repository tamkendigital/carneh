<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('cardType.card_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="card_type">{{ trans('cruds.cardType.fields.card_type') }}</label>
        <input class="form-control" type="text" name="card_type" id="card_type" required wire:model.defer="cardType.card_type">
        <div class="validation-message">
            {{ $errors->first('cardType.card_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cardType.fields.card_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.card-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>