<?php

namespace App\Http\Controllers\Admin;

use App\Asset;
use App\Assethandover;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAssethandoverRequest;
use App\Http\Requests\StoreAssethandoverRequest;
use App\Http\Requests\UpdateAssethandoverRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AssethandoverController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('assethandover_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assethandovers = Assethandover::all();

        return view('admin.assethandovers.index', compact('assethandovers'));
    }

    public function create()
    {
        abort_if(Gate::denies('assethandover_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empids = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assets = Asset::all()->pluck('name', 'id');

        return view('admin.assethandovers.create', compact('empids', 'assets'));
    }

    public function store(StoreAssethandoverRequest $request)
    {
        $assethandover = Assethandover::create($request->all());
        $assethandover->assets()->sync($request->input('assets', []));

        foreach ($request->input('approvals', []) as $file) {
            $assethandover->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('approvals');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $assethandover->id]);
        }

        return redirect()->route('admin.assethandovers.index');
    }

    public function edit(Assethandover $assethandover)
    {
        abort_if(Gate::denies('assethandover_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empids = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assets = Asset::all()->pluck('name', 'id');

        $assethandover->load('empid', 'assets', 'created_by', 'updated_by');

        return view('admin.assethandovers.edit', compact('empids', 'assets', 'assethandover'));
    }

    public function update(UpdateAssethandoverRequest $request, Assethandover $assethandover)
    {
        $assethandover->update($request->all());
        $assethandover->assets()->sync($request->input('assets', []));

        if (count($assethandover->approvals) > 0) {
            foreach ($assethandover->approvals as $media) {
                if (!in_array($media->file_name, $request->input('approvals', []))) {
                    $media->delete();
                }
            }
        }

        $media = $assethandover->approvals->pluck('file_name')->toArray();

        foreach ($request->input('approvals', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $assethandover->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('approvals');
            }
        }

        return redirect()->route('admin.assethandovers.index');
    }

    public function show(Assethandover $assethandover)
    {
        abort_if(Gate::denies('assethandover_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assethandover->load('empid', 'assets', 'created_by', 'updated_by');

        return view('admin.assethandovers.show', compact('assethandover'));
    }

    public function destroy(Assethandover $assethandover)
    {
        abort_if(Gate::denies('assethandover_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assethandover->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssethandoverRequest $request)
    {
        Assethandover::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('assethandover_create') && Gate::denies('assethandover_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Assethandover();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
