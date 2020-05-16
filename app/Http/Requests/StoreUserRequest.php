<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'password'      => [
                'required',
            ],
            'email'         => [
                'required',
                'unique:users',
            ],
            'mobile'        => [
                'min:10',
                'max:10',
                'required',
                'unique:users',
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
