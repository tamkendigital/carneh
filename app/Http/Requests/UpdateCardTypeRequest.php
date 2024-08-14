<?php

namespace App\Http\Requests;

use App\Models\CardType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCardTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('card_type_edit'),
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
            'card_type' => [
                'string',
                'required',
                'unique:card_types,card_type,' . request()->route('cardType')->id,
            ],
        ];
    }
}
