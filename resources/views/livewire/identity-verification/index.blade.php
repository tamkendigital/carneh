<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('identity_verification_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="IdentityVerification" format="csv" />
                <livewire:excel-export model="IdentityVerification" format="xlsx" />
                <livewire:excel-export model="IdentityVerification" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.identityVerification.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.identityVerification.fields.verificationcode') }}
                            @include('components.table.sort', ['field' => 'verificationcode'])
                        </th>
                        <th>
                            {{ trans('cruds.identityVerification.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.identityVerification.fields.national_n_opassport') }}
                            @include('components.table.sort', ['field' => 'national_n_opassport'])
                        </th>
                        <th>
                            {{ trans('cruds.identityVerification.fields.verification_status') }}
                            @include('components.table.sort', ['field' => 'verification_status'])
                        </th>
                        <th>
                            {{ trans('cruds.identityVerification.fields.verification_date') }}
                            @include('components.table.sort', ['field' => 'verification_date'])
                        </th>
                        <th>
                            {{ trans('cruds.identityVerification.fields.verified_by') }}
                            @include('components.table.sort', ['field' => 'verified_by'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($identityVerifications as $identityVerification)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $identityVerification->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $identityVerification->id }}
                            </td>
                            <td>
                                {{ $identityVerification->verificationcode }}
                            </td>
                            <td>
                                @if($identityVerification->user)
                                    <span class="badge badge-relationship">{{ $identityVerification->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $identityVerification->national_n_opassport }}
                            </td>
                            <td>
                                {{ $identityVerification->verification_status_label }}
                            </td>
                            <td>
                                {{ $identityVerification->verification_date }}
                            </td>
                            <td>
                                {{ $identityVerification->verified_by }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('identity_verification_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.identity-verifications.show', $identityVerification) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('identity_verification_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.identity-verifications.edit', $identityVerification) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('identity_verification_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $identityVerification->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $identityVerifications->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush