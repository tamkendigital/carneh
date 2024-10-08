<?php

namespace App\Http\Requests;

use App\Models\Region;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRegionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('region_create'),
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
            'region_name' => [
                'string',
                'required',
                'unique:regions,region_name',
            ],
            'region_ios' => [
                'string',
                'required',
                'unique:regions,region_ios',
            ],
        ];
    }
}
