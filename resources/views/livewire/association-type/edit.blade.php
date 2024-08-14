<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('associationType.association_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="association_type">{{ trans('cruds.associationType.fields.association_type') }}</label>
        <input class="form-control" type="text" name="association_type" id="association_type" required wire:model.defer="associationType.association_type">
        <div class="validation-message">
            {{ $errors->first('associationType.association_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.associationType.fields.association_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.association-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>