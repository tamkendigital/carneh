<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('associationList.association_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="association_name">{{ trans('cruds.associationList.fields.association_name') }}</label>
        <input class="form-control" type="text" name="association_name" id="association_name" required wire:model.defer="associationList.association_name">
        <div class="validation-message">
            {{ $errors->first('associationList.association_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.associationList.fields.association_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('associationList.association_type_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="association_type">{{ trans('cruds.associationList.fields.association_type') }}</label>
        <x-select-list class="form-control" required id="association_type" name="association_type" :options="$this->listsForFields['association_type']" wire:model="associationList.association_type_id" />
        <div class="validation-message">
            {{ $errors->first('associationList.association_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.associationList.fields.association_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.association_list_association_logo') ? 'invalid' : '' }}">
        <label class="form-label" for="association_logo">{{ trans('cruds.associationList.fields.association_logo') }}</label>
        <x-dropzone id="association_logo" name="association_logo" action="{{ route('admin.association-lists.storeMedia') }}" collection-name="association_list_association_logo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.association_list_association_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.associationList.fields.association_logo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('associationList.association_address') ? 'invalid' : '' }}">
        <label class="form-label required" for="association_address">{{ trans('cruds.associationList.fields.association_address') }}</label>
        <input class="form-control" type="text" name="association_address" id="association_address" required wire:model.defer="associationList.association_address">
        <div class="validation-message">
            {{ $errors->first('associationList.association_address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.associationList.fields.association_address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('associationList.website') ? 'invalid' : '' }}">
        <label class="form-label" for="website">{{ trans('cruds.associationList.fields.website') }}</label>
        <input class="form-control" type="text" name="website" id="website" wire:model.defer="associationList.website">
        <div class="validation-message">
            {{ $errors->first('associationList.website') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.associationList.fields.website_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.association-lists.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>