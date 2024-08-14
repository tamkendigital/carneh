<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('city.city_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="city_name">{{ trans('cruds.city.fields.city_name') }}</label>
        <input class="form-control" type="text" name="city_name" id="city_name" required wire:model.defer="city.city_name">
        <div class="validation-message">
            {{ $errors->first('city.city_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.city.fields.city_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('city.city_iso') ? 'invalid' : '' }}">
        <label class="form-label" for="city_iso">{{ trans('cruds.city.fields.city_iso') }}</label>
        <input class="form-control" type="text" name="city_iso" id="city_iso" wire:model.defer="city.city_iso">
        <div class="validation-message">
            {{ $errors->first('city.city_iso') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.city.fields.city_iso_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('city.region_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="region">{{ trans('cruds.city.fields.region') }}</label>
        <x-select-list class="form-control" required id="region" name="region" :options="$this->listsForFields['region']" wire:model="city.region_id" />
        <div class="validation-message">
            {{ $errors->first('city.region_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.city.fields.region_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>