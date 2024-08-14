<?php

namespace App\Http\Livewire\AssociationType;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\AssociationType;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new AssociationType())->orderable;
    }

    public function render()
    {
        $query = AssociationType::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $associationTypes = $query->paginate($this->perPage);

        return view('livewire.association-type.index', compact('associationTypes', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('association_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AssociationType::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(AssociationType $associationType)
    {
        abort_if(Gate::denies('association_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $associationType->delete();
    }
}
