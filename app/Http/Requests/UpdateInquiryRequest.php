<?php

namespace App\Http\Requests;

use App\Models\Inquiry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInquiryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('inquiry_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'inquiriesnumber' => [
                'string',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'association_id' => [
                'integer',
                'exists:association_lists,id',
                'nullable',
            ],
            'request_type' => [
                'nullable',
                'in:' . implode(',', array_keys(Inquiry::REQUEST_TYPE_SELECT)),
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Inquiry::STATUS_SELECT)),
            ],
            'submission_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'approval_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }
}
