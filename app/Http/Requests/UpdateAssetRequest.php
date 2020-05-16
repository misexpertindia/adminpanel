<?php

namespace App\Http\Requests;

use App\Asset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAssetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'category_id'    => [
                'required',
                'integer',
            ],
            'status_id'      => [
                'required',
                'integer',
            ],
            'location_id'    => [
                'required',
                'integer',
            ],
            'effective_from' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'effective_to'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
