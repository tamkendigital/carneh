<?php

namespace App\Http\Livewire\CardType;

use App\Models\CardType;
use Livewire\Component;

class Edit extends Component
{
    public CardType $cardType;

    public function mount(CardType $cardType)
    {
        $this->cardType = $cardType;
    }

    public function render()
    {
        return view('livewire.card-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->cardType->save();

        return redirect()->route('admin.card-types.index');
    }

    protected function rules(): array
    {
        return [
            'cardType.card_type' => [
                'string',
                'required',
                'unique:card_types,card_type,' . $this->cardType->id,
            ],
        ];
    }
}
