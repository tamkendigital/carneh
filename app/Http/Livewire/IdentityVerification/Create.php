<?php

namespace App\Http\Livewire\IdentityVerification;

use App\Models\IdentityVerification;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public IdentityVerification $identityVerification;

    public function mount(IdentityVerification $identityVerification)
    {
        $this->identityVerification = $identityVerification;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.identity-verification.create');
    }

    public function submit()
    {
        $this->validate();

        $this->identityVerification->save();

        return redirect()->route('admin.identity-verifications.index');
    }

    protected function rules(): array
    {
        return [
            'identityVerification.verificationcode' => [
                'string',
                'nullable',
            ],
            'identityVerification.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'identityVerification.national_n_opassport' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'identityVerification.verification_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['verification_status'])),
            ],
            'identityVerification.verification_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'identityVerification.verified_by' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']                = User::pluck('name', 'id')->toArray();
        $this->listsForFields['verification_status'] = $this->identityVerification::VERIFICATION_STATUS_SELECT;
    }
}
