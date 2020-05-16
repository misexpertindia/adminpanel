<?php

namespace App\Http\Requests;

use App\Assethandover;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssethandoverRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('assethandover_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:assethandovers,id',
        ];
    }
}
