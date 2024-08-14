<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('membershipPackage.package_name') ? 'invalid' : '' }}">
        <label class="form-label" for="package_name">{{ trans('cruds.membershipPackage.fields.package_name') }}</label>
        <input class="form-control" type="text" name="package_name" id="package_name" wire:model.defer="membershipPackage.package_name">
        <div class="validation-message">
            {{ $errors->first('membershipPackage.package_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.package_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membership_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="membership_type">{{ trans('cruds.membershipPackage.fields.membership_type') }}</label>
        <x-select-list class="form-control" required id="membership_type" name="membership_type" wire:model="membership_type" :options="$this->listsForFields['membership_type']" multiple />
        <div class="validation-message">
            {{ $errors->first('membership_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.membership_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('card_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="card_type">{{ trans('cruds.membershipPackage.fields.card_type') }}</label>
        <x-select-list class="form-control" required id="card_type" name="card_type" wire:model="card_type" :options="$this->listsForFields['card_type']" multiple />
        <div class="validation-message">
            {{ $errors->first('card_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.card_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membershipPackage.price') ? 'invalid' : '' }}">
        <label class="form-label" for="price">{{ trans('cruds.membershipPackage.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" wire:model.defer="membershipPackage.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('membershipPackage.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membershipPackage.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.membershipPackage.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" required wire:model.defer="membershipPackage.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('membershipPackage.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membershipPackage.duration') ? 'invalid' : '' }}">
        <label class="form-label" for="duration">{{ trans('cruds.membershipPackage.fields.duration') }}</label>
        <input class="form-control" type="number" name="duration" id="duration" wire:model.defer="membershipPackage.duration" step="0.01">
        <div class="validation-message">
            {{ $errors->first('membershipPackage.duration') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.duration_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membershipPackage.is_renewable') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="is_renewable" id="is_renewable" wire:model.defer="membershipPackage.is_renewable">
        <label class="form-label inline ml-1" for="is_renewable">{{ trans('cruds.membershipPackage.fields.is_renewable') }}</label>
        <div class="validation-message">
            {{ $errors->first('membershipPackage.is_renewable') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.is_renewable_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membershipPackage.is_active') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.membershipPackage.fields.is_active') }}</label>
        <select class="form-control" wire:model="membershipPackage.is_active">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['is_active'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('membershipPackage.is_active') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membershipPackage.fields.is_active_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.membership-packages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>