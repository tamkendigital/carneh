<?php

namespace App\Http\Requests;

use App\Models\MembershipType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMembershipTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('membership_type_edit'),
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
            'membership_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
