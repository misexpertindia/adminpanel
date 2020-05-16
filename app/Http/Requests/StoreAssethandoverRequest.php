<?php

namespace App\Http\Requests;

use App\Assethandover;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAssethandoverRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('assethandover_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'empid_id'           => [
                'required',
                'integer',
            ],
            'assets.*'           => [
                'integer',
            ],
            'assets'             => [
                'array',
            ],
            'exitemailrec'       => [
                'required',
            ],
            'allassets'          => [
                'required',
            ],
            'addeactivationdate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'approvals.*'        => [
                'required',
            ],
            'itapprovaldate'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
