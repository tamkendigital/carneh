<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('association_list_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="AssociationList" format="csv" />
                <livewire:excel-export model="AssociationList" format="xlsx" />
                <livewire:excel-export model="AssociationList" format="pdf" />
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
                            {{ trans('cruds.associationList.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.associationList.fields.association_name') }}
                            @include('components.table.sort', ['field' => 'association_name'])
                        </th>
                        <th>
                            {{ trans('cruds.associationList.fields.association_type') }}
                            @include('components.table.sort', ['field' => 'association_type.association_type'])
                        </th>
                        <th>
                            {{ trans('cruds.associationList.fields.association_logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.associationList.fields.association_address') }}
                            @include('components.table.sort', ['field' => 'association_address'])
                        </th>
                        <th>
                            {{ trans('cruds.associationList.fields.website') }}
                            @include('components.table.sort', ['field' => 'website'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($associationLists as $associationList)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $associationList->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $associationList->id }}
                            </td>
                            <td>
                                {{ $associationList->association_name }}
                            </td>
                            <td>
                                @if($associationList->associationType)
                                    <span class="badge badge-relationship">{{ $associationList->associationType->association_type ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($associationList->association_logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $associationList->association_address }}
                            </td>
                            <td>
                                {{ $associationList->website }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('association_list_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.association-lists.show', $associationList) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('association_list_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.association-lists.edit', $associationList) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('association_list_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $associationList->id }})" wire:loading.attr="disabled">
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
            {{ $associationLists->links() }}
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