<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('inquiry.inquiriesnumber') ? 'invalid' : '' }}">
        <label class="form-label" for="inquiriesnumber">{{ trans('cruds.inquiry.fields.inquiriesnumber') }}</label>
        <input class="form-control" type="text" name="inquiriesnumber" id="inquiriesnumber" wire:model.defer="inquiry.inquiriesnumber">
        <div class="validation-message">
            {{ $errors->first('inquiry.inquiriesnumber') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inquiry.fields.inquiriesnumber_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inquiry.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.inquiry.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="inquiry.user_id" />
        <div class="validation-message">
            {{ $errors->first('inquiry.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inquiry.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inquiry.association_id') ? 'invalid' : '' }}">
        <label class="form-label" for="association">{{ trans('cruds.inquiry.fields.association') }}</label>
        <x-select-list class="form-control" id="association" name="association" :options="$this->listsForFields['association']" wire:model="inquiry.association_id" />
        <div class="validation-message">
            {{ $errors->first('inquiry.association_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inquiry.fields.association_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inquiry.request_type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.inquiry.fields.request_type') }}</label>
        <select class="form-control" wire:model="inquiry.request_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['request_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('inquiry.request_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inquiry.fields.request_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inquiry.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.inquiry.fields.status') }}</label>
        <select class="form-control" wire:model="inquiry.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('inquiry.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inquiry.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inquiry.submission_date') ? 'invalid' : '' }}">
        <label class="form-label" for="submission_date">{{ trans('cruds.inquiry.fields.submission_date') }}</label>
        <x-date-picker class="form-control" wire:model="inquiry.submission_date" id="submission_date" name="submission_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('inquiry.submission_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inquiry.fields.submission_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inquiry.approval_date') ? 'invalid' : '' }}">
        <label class="form-label" for="approval_date">{{ trans('cruds.inquiry.fields.approval_date') }}</label>
        <x-date-picker class="form-control" wire:model="inquiry.approval_date" id="approval_date" name="approval_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('inquiry.approval_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inquiry.fields.approval_date_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>