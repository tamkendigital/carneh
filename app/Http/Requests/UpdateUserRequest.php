<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('user_edit'),
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
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'locale' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'idnational' => [
                'string',
                'nullable',
            ],
            'date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }
}
