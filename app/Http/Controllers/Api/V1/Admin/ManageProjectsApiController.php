<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManageProjectRequest;
use App\Http\Requests\UpdateManageProjectRequest;
use App\Http\Resources\Admin\ManageProjectResource;
use App\ManageProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageProjectsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageProjectResource(ManageProject::all());
    }

    public function store(StoreManageProjectRequest $request)
    {
        $manageProject = ManageProject::create($request->all());

        return (new ManageProjectResource($manageProject))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManageProject $manageProject)
    {
        abort_if(Gate::denies('manage_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageProjectResource($manageProject);
    }

    public function update(UpdateManageProjectRequest $request, ManageProject $manageProject)
    {
        $manageProject->update($request->all());

        return (new ManageProjectResource($manageProject))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManageProject $manageProject)
    {
        abort_if(Gate::denies('manage_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageProject->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
