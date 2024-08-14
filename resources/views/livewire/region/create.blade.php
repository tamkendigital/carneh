<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('region.region_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="region_name">{{ trans('cruds.region.fields.region_name') }}</label>
        <input class="form-control" type="text" name="region_name" id="region_name" required wire:model.defer="region.region_name">
        <div class="validation-message">
            {{ $errors->first('region.region_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.region.fields.region_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('region.region_ios') ? 'invalid' : '' }}">
        <label class="form-label required" for="region_ios">{{ trans('cruds.region.fields.region_ios') }}</label>
        <input class="form-control" type="text" name="region_ios" id="region_ios" required wire:model.defer="region.region_ios">
        <div class="validation-message">
            {{ $errors->first('region.region_ios') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.region.fields.region_ios_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.regions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>