<?php

namespace App\Http\Livewire\City;

use App\Models\City;
use App\Models\Region;
use Livewire\Component;

class Create extends Component
{
    public City $city;

    public array $listsForFields = [];

    public function mount(City $city)
    {
        $this->city = $city;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.city.create');
    }

    public function submit()
    {
        $this->validate();

        $this->city->save();

        return redirect()->route('admin.cities.index');
    }

    protected function rules(): array
    {
        return [
            'city.city_name' => [
                'string',
                'required',
                'unique:cities,city_name',
            ],
            'city.city_iso' => [
                'string',
                'nullable',
            ],
            'city.region_id' => [
                'integer',
                'exists:regions,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['region'] = Region::pluck('region_name', 'id')->toArray();
    }
}
