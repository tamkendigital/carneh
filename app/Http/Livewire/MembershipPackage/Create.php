<?php

namespace App\Http\Livewire\MembershipPackage;

use App\Models\CardType;
use App\Models\MembershipPackage;
use App\Models\MembershipType;
use Livewire\Component;

class Create extends Component
{
    public array $card_type = [];

    public array $listsForFields = [];

    public array $membership_type = [];

    public MembershipPackage $membershipPackage;

    public function mount(MembershipPackage $membershipPackage)
    {
        $this->membershipPackage               = $membershipPackage;
        $this->membershipPackage->is_renewable = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.membership-package.create');
    }

    public function submit()
    {
        $this->validate();

        $this->membershipPackage->save();
        $this->membershipPackage->membershipType()->sync($this->membership_type);
        $this->membershipPackage->cardType()->sync($this->card_type);

        return redirect()->route('admin.membership-packages.index');
    }

    protected function rules(): array
    {
        return [
            'membershipPackage.package_name' => [
                'string',
                'nullable',
            ],
            'membership_type' => [
                'required',
                'array',
            ],
            'membership_type.*.id' => [
                'integer',
                'exists:membership_types,id',
            ],
            'card_type' => [
                'required',
                'array',
            ],
            'card_type.*.id' => [
                'integer',
                'exists:card_types,id',
            ],
            'membershipPackage.price' => [
                'numeric',
                'nullable',
            ],
            'membershipPackage.description' => [
                'string',
                'required',
            ],
            'membershipPackage.duration' => [
                'numeric',
                'nullable',
            ],
            'membershipPackage.is_renewable' => [
                'boolean',
            ],
            'membershipPackage.is_active' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['is_active'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['membership_type'] = MembershipType::pluck('membership_type', 'id')->toArray();
        $this->listsForFields['card_type']       = CardType::pluck('card_type', 'id')->toArray();
        $this->listsForFields['is_active']       = $this->membershipPackage::IS_ACTIVE_SELECT;
    }
}
