<?php

namespace App\Http\Requests;

use App\Models\Region;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRegionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('region_edit'),
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
                'unique:regions,region_name,' . request()->route('region')->id,
            ],
            'region_ios' => [
                'string',
                'required',
                'unique:regions,region_ios,' . request()->route('region')->id,
            ],
        ];
    }
}
