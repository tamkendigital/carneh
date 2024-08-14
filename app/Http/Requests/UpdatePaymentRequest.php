<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('payment_edit'),
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
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'package_id' => [
                'integer',
                'exists:membership_packages,id',
                'nullable',
            ],
            'payment_amount_id' => [
                'integer',
                'exists:membership_packages,id',
                'nullable',
            ],
            'payment_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'payment_method' => [
                'nullable',
                'in:' . implode(',', array_keys(Payment::PAYMENT_METHOD_SELECT)),
            ],
            'transaction_number' => [
                'string',
                'nullable',
            ],
            'payment_status' => [
                'nullable',
                'in:' . implode(',', array_keys(Payment::PAYMENT_STATUS_SELECT)),
            ],
        ];
    }
}
