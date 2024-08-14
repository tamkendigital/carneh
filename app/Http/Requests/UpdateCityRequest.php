<?php

namespace App\Http\Requests;

use App\Models\City;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('city_edit'),
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
                'unique:cities,city_name,' . request()->route('city')->id,
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
