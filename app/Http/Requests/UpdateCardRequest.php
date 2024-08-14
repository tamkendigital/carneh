<?php

namespace App\Http\Requests;

use App\Models\Card;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('card_edit'),
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
            'card_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'issue_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'expiry_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'association_id' => [
                'integer',
                'exists:association_lists,id',
                'nullable',
            ],
        ];
    }
}
