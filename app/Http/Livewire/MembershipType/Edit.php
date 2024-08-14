<?php

namespace App\Http\Livewire\MembershipType;

use App\Models\MembershipType;
use Livewire\Component;

class Edit extends Component
{
    public MembershipType $membershipType;

    public function mount(MembershipType $membershipType)
    {
        $this->membershipType = $membershipType;
    }

    public function render()
    {
        return view('livewire.membership-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->membershipType->save();

        return redirect()->route('admin.membership-types.index');
    }

    protected function rules(): array
    {
        return [
            'membershipType.membership_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
