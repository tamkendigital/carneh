<?php

namespace App\Http\Requests;

use App\Models\IdentityVerification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIdentityVerificationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('identity_verification_create'),
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
            'verificationcode' => [
                'string',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'national_n_opassport' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'verification_status' => [
                'nullable',
                'in:' . implode(',', array_keys(IdentityVerification::VERIFICATION_STATUS_SELECT)),
            ],
            'verification_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'verified_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
