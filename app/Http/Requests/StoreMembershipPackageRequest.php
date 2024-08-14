<?php

namespace App\Http\Requests;

use App\Models\MembershipPackage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMembershipPackageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('membership_package_create'),
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
            'package_name' => [
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
            'price' => [
                'numeric',
                'nullable',
            ],
            'description' => [
                'string',
                'required',
            ],
            'duration' => [
                'numeric',
                'nullable',
            ],
            'is_renewable' => [
                'boolean',
            ],
            'is_active' => [
                'nullable',
                'in:' . implode(',', array_keys(MembershipPackage::IS_ACTIVE_SELECT)),
            ],
        ];
    }
}
