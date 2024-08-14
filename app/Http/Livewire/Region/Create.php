<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;

class Create extends Component
{
    public Region $region;

    public function mount(Region $region)
    {
        $this->region = $region;
    }

    public function render()
    {
        return view('livewire.region.create');
    }

    public function submit()
    {
        $this->validate();

        $this->region->save();

        return redirect()->route('admin.regions.index');
    }

    protected function rules(): array
    {
        return [
            'region.region_name' => [
                'string',
                'required',
                'unique:regions,region_name',
            ],
            'region.region_ios' => [
                'string',
                'required',
                'unique:regions,region_ios',
            ],
        ];
    }
}
