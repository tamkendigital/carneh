<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('membershipType.membership_type') ? 'invalid' : '' }}">
        <label class="form-label" for="membership_type">{{ trans('cruds.membershipType.fields.membership_type') }}</label>
        <input class="form-control" type="text" name="membership_type" id="membership_type" wire:model.defer="membershipType.membership_type">
        <div class="validation-message">
            {{ $errors->first('membershipType.membership_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipType.fields.membership_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.membership-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>