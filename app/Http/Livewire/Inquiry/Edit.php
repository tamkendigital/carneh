<?php

namespace App\Http\Livewire\Inquiry;

use App\Models\AssociationList;
use App\Models\Inquiry;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Inquiry $inquiry;

    public array $listsForFields = [];

    public function mount(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.inquiry.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->inquiry->save();

        return redirect()->route('admin.inquiries.index');
    }

    protected function rules(): array
    {
        return [
            'inquiry.inquiriesnumber' => [
                'string',
                'nullable',
            ],
            'inquiry.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'inquiry.association_id' => [
                'integer',
                'exists:association_lists,id',
                'nullable',
            ],
            'inquiry.request_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['request_type'])),
            ],
            'inquiry.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'inquiry.submission_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'inquiry.approval_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['association']  = AssociationList::pluck('association_name', 'id')->toArray();
        $this->listsForFields['request_type'] = $this->inquiry::REQUEST_TYPE_SELECT;
        $this->listsForFields['status']       = $this->inquiry::STATUS_SELECT;
    }
}
