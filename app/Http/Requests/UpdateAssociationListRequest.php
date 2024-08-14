<?php

namespace App\Http\Requests;

use App\Models\AssociationList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssociationListRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('association_list_edit'),
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
            'association_name' => [
                'string',
                'required',
                'unique:association_lists,association_name,' . request()->route('associationList')->id,
            ],
            'association_type_id' => [
                'integer',
                'exists:association_types,id',
                'required',
            ],
            'association_address' => [
                'string',
                'required',
            ],
            'website' => [
                'string',
                'nullable',
            ],
        ];
    }
}
