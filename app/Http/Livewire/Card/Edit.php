<?php

namespace App\Http\Livewire\Card;

use App\Models\AssociationList;
use App\Models\Card;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Card $card;

    public array $listsForFields = [];

    public function mount(Card $card)
    {
        $this->card = $card;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.card.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->card->save();

        return redirect()->route('admin.cards.index');
    }

    protected function rules(): array
    {
        return [
            'card.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'card.card_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'card.issue_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'card.expiry_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'card.association_id' => [
                'integer',
                'exists:association_lists,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']        = User::pluck('name', 'id')->toArray();
        $this->listsForFields['association'] = AssociationList::pluck('association_name', 'id')->toArray();
    }
}
