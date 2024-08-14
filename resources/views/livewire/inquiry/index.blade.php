<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('inquiry_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Inquiry" format="csv" />
                <livewire:excel-export model="Inquiry" format="xlsx" />
                <livewire:excel-export model="Inquiry" format="pdf" />
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
                            {{ trans('cruds.inquiry.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.inquiriesnumber') }}
                            @include('components.table.sort', ['field' => 'inquiriesnumber'])
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.association') }}
                            @include('components.table.sort', ['field' => 'association.association_name'])
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.request_type') }}
                            @include('components.table.sort', ['field' => 'request_type'])
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.submission_date') }}
                            @include('components.table.sort', ['field' => 'submission_date'])
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.approval_date') }}
                            @include('components.table.sort', ['field' => 'approval_date'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inquiry)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $inquiry->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $inquiry->id }}
                            </td>
                            <td>
                                {{ $inquiry->inquiriesnumber }}
                            </td>
                            <td>
                                @if($inquiry->user)
                                    <span class="badge badge-relationship">{{ $inquiry->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($inquiry->association)
                                    <span class="badge badge-relationship">{{ $inquiry->association->association_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $inquiry->request_type_label }}
                            </td>
                            <td>
                                {{ $inquiry->status_label }}
                            </td>
                            <td>
                                {{ $inquiry->submission_date }}
                            </td>
                            <td>
                                {{ $inquiry->approval_date }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('inquiry_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.inquiries.show', $inquiry) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('inquiry_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.inquiries.edit', $inquiry) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('inquiry_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $inquiry->id }})" wire:loading.attr="disabled">
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
            {{ $inquiries->links() }}
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