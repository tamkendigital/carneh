<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.last_name') ? 'invalid' : '' }}">
        <label class="form-label" for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
        <input class="form-control" type="text" name="last_name" id="last_name" wire:model.defer="user.last_name">
        <div class="validation-message">
            {{ $errors->first('user.last_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.last_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.phone_number') ? 'invalid' : '' }}">
        <label class="form-label" for="phone_number">{{ trans('cruds.user.fields.phone_number') }}</label>
        <input class="form-control" type="number" name="phone_number" id="phone_number" wire:model.defer="user.phone_number" step="1">
        <div class="validation-message">
            {{ $errors->first('user.phone_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.phone_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.idnational') ? 'invalid' : '' }}">
        <label class="form-label" for="idnational">{{ trans('cruds.user.fields.idnational') }}</label>
        <input class="form-control" type="text" name="idnational" id="idnational" wire:model.defer="user.idnational">
        <div class="validation-message">
            {{ $errors->first('user.idnational') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.idnational_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.date_of_birth') ? 'invalid' : '' }}">
        <label class="form-label" for="date_of_birth">{{ trans('cruds.user.fields.date_of_birth') }}</label>
        <x-date-picker class="form-control" wire:model="user.date_of_birth" id="date_of_birth" name="date_of_birth" picker="date" />
        <div class="validation-message">
            {{ $errors->first('user.date_of_birth') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.date_of_birth_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>