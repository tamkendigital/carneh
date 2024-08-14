<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('membership_package_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="MembershipPackage" format="csv" />
                <livewire:excel-export model="MembershipPackage" format="xlsx" />
                <livewire:excel-export model="MembershipPackage" format="pdf" />
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
                            {{ trans('cruds.membershipPackage.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.package_name') }}
                            @include('components.table.sort', ['field' => 'package_name'])
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.membership_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.card_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.price') }}
                            @include('components.table.sort', ['field' => 'price'])
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.duration') }}
                            @include('components.table.sort', ['field' => 'duration'])
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.is_renewable') }}
                            @include('components.table.sort', ['field' => 'is_renewable'])
                        </th>
                        <th>
                            {{ trans('cruds.membershipPackage.fields.is_active') }}
                            @include('components.table.sort', ['field' => 'is_active'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($membershipPackages as $membershipPackage)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $membershipPackage->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $membershipPackage->id }}
                            </td>
                            <td>
                                {{ $membershipPackage->package_name }}
                            </td>
                            <td>
                                @foreach($membershipPackage->membershipType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->membership_type }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($membershipPackage->cardType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->card_type }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $membershipPackage->price }}
                            </td>
                            <td>
                                {{ $membershipPackage->description }}
                            </td>
                            <td>
                                {{ $membershipPackage->duration }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $membershipPackage->is_renewable ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $membershipPackage->is_active_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('membership_package_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.membership-packages.show', $membershipPackage) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('membership_package_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.membership-packages.edit', $membershipPackage) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('membership_package_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $membershipPackage->id }})" wire:loading.attr="disabled">
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
            {{ $membershipPackages->links() }}
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