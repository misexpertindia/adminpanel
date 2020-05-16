<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Assethandover;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAssethandoverRequest;
use App\Http\Requests\UpdateAssethandoverRequest;
use App\Http\Resources\Admin\AssethandoverResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssethandoverApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('assethandover_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssethandoverResource(Assethandover::with(['empid', 'assets', 'created_by', 'updated_by'])->get());
    }

    public function store(StoreAssethandoverRequest $request)
    {
        $assethandover = Assethandover::create($request->all());
        $assethandover->assets()->sync($request->input('assets', []));

        if ($request->input('approvals', false)) {
            $assethandover->addMedia(storage_path('tmp/uploads/' . $request->input('approvals')))->toMediaCollection('approvals');
        }

        return (new AssethandoverResource($assethandover))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Assethandover $assethandover)
    {
        abort_if(Gate::denies('assethandover_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssethandoverResource($assethandover->load(['empid', 'assets', 'created_by', 'updated_by']));
    }

    public function update(UpdateAssethandoverRequest $request, Assethandover $assethandover)
    {
        $assethandover->update($request->all());
        $assethandover->assets()->sync($request->input('assets', []));

        if ($request->input('approvals', false)) {
            if (!$assethandover->approvals || $request->input('approvals') !== $assethandover->approvals->file_name) {
                $assethandover->addMedia(storage_path('tmp/uploads/' . $request->input('approvals')))->toMediaCollection('approvals');
            }
        } elseif ($assethandover->approvals) {
            $assethandover->approvals->delete();
        }

        return (new AssethandoverResource($assethandover))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Assethandover $assethandover)
    {
        abort_if(Gate::denies('assethandover_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assethandover->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
