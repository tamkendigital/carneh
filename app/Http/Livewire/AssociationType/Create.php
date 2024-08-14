<?php

namespace App\Http\Livewire\AssociationType;

use App\Models\AssociationType;
use Livewire\Component;

class Create extends Component
{
    public AssociationType $associationType;

    public function mount(AssociationType $associationType)
    {
        $this->associationType = $associationType;
    }

    public function render()
    {
        return view('livewire.association-type.create');
    }

    public function submit()
    {
        $this->validate();

        $this->associationType->save();

        return redirect()->route('admin.association-types.index');
    }

    protected function rules(): array
    {
        return [
            'associationType.association_type' => [
                'string',
                'required',
                'unique:association_types,association_type',
            ],
        ];
    }
}
