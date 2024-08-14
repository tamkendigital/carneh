<?php

namespace App\Http\Requests;

use App\Models\City;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('city_create'),
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
            'city_name' => [
                'string',
                'required',
                'unique:cities,city_name',
            ],
            'city_iso' => [
                'string',
                'nullable',
            ],
            'region_id' => [
                'integer',
                'exists:regions,id',
                'required',
            ],
        ];
    }
}
