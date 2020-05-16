<?php

namespace App\Http\Requests;

use App\ManageProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateManageProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('manage_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'desc' => [
                'min:5',
                'max:200',
                'required',
            ],
        ];
    }
}
