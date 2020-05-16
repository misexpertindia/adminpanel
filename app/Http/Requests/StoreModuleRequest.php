<?php

namespace App\Http\Requests;

use App\Module;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreModuleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('module_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'module'       => [
                'min:5',
                'max:20',
                'required',
                'unique:modules',
            ],
            'desc'         => [
                'min:5',
                'max:200',
                'required',
            ],
            'projectid_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
