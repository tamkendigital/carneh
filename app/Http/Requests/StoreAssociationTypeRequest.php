<?php

namespace App\Http\Requests;

use App\Models\AssociationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssociationTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('association_type_create'),
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
            'association_type' => [
                'string',
                'required',
                'unique:association_types,association_type',
            ],
        ];
    }
}
