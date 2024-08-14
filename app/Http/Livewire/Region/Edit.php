<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;

class Edit extends Component
{
    public Region $region;

    public function mount(Region $region)
    {
        $this->region = $region;
    }

    public function render()
    {
        return view('livewire.region.edit');
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
                'unique:regions,region_name,' . $this->region->id,
            ],
            'region.region_ios' => [
                'string',
                'required',
                'unique:regions,region_ios,' . $this->region->id,
            ],
        ];
    }
}
