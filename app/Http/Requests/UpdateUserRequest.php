<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'          => [
                'required',
            ],
            'emp_code'      => [
                'min:1',
                'max:20',
            ],
            'email'         => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'mobile'        => [
                'min:10',
                'max:10',
                'required',
                'unique:users,mobile,' . request()->route('user')->id,
            ],
            'usertype'      => [
                'required',
            ],
            'roles.*'       => [
                'integer',
            ],
            'roles'         => [
                'required',
                'array',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
