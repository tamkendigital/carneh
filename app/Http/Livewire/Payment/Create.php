<?php

namespace App\Http\Livewire\Payment;

use App\Models\MembershipPackage;
use App\Models\Payment;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Payment $payment;

    public array $listsForFields = [];

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment.create');
    }

    public function submit()
    {
        $this->validate();

        $this->payment->save();

        return redirect()->route('admin.payments.index');
    }

    protected function rules(): array
    {
        return [
            'payment.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'payment.package_id' => [
                'integer',
                'exists:membership_packages,id',
                'nullable',
            ],
            'payment.payment_amount_id' => [
                'integer',
                'exists:membership_packages,id',
                'nullable',
            ],
            'payment.payment_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'payment.payment_method' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['payment_method'])),
            ],
            'payment.transaction_number' => [
                'string',
                'nullable',
            ],
            'payment.payment_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['payment_status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']           = User::pluck('name', 'id')->toArray();
        $this->listsForFields['package']        = MembershipPackage::pluck('package_name', 'id')->toArray();
        $this->listsForFields['payment_amount'] = MembershipPackage::pluck('price', 'id')->toArray();
        $this->listsForFields['payment_method'] = $this->payment::PAYMENT_METHOD_SELECT;
        $this->listsForFields['payment_status'] = $this->payment::PAYMENT_STATUS_SELECT;
    }
}
