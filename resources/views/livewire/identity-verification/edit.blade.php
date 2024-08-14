<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('identityVerification.verificationcode') ? 'invalid' : '' }}">
        <label class="form-label" for="verificationcode">{{ trans('cruds.identityVerification.fields.verificationcode') }}</label>
        <input class="form-control" type="text" name="verificationcode" id="verificationcode" wire:model.defer="identityVerification.verificationcode">
        <div class="validation-message">
            {{ $errors->first('identityVerification.verificationcode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.identityVerification.fields.verificationcode_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('identityVerification.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.identityVerification.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="identityVerification.user_id" />
        <div class="validation-message">
            {{ $errors->first('identityVerification.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.identityVerification.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('identityVerification.national_n_opassport') ? 'invalid' : '' }}">
        <label class="form-label" for="national_n_opassport">{{ trans('cruds.identityVerification.fields.national_n_opassport') }}</label>
        <input class="form-control" type="number" name="national_n_opassport" id="national_n_opassport" wire:model.defer="identityVerification.national_n_opassport" step="1">
        <div class="validation-message">
            {{ $errors->first('identityVerification.national_n_opassport') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.identityVerification.fields.national_n_opassport_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('identityVerification.verification_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.identityVerification.fields.verification_status') }}</label>
        <select class="form-control" wire:model="identityVerification.verification_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['verification_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('identityVerification.verification_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.identityVerification.fields.verification_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('identityVerification.verification_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="verification_date">{{ trans('cruds.identityVerification.fields.verification_date') }}</label>
        <x-date-picker class="form-control" required wire:model="identityVerification.verification_date" id="verification_date" name="verification_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('identityVerification.verification_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.identityVerification.fields.verification_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('identityVerification.verified_by') ? 'invalid' : '' }}">
        <label class="form-label" for="verified_by">{{ trans('cruds.identityVerification.fields.verified_by') }}</label>
        <input class="form-control" type="text" name="verified_by" id="verified_by" wire:model.defer="identityVerification.verified_by">
        <div class="validation-message">
            {{ $errors->first('identityVerification.verified_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.identityVerification.fields.verified_by_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.identity-verifications.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>