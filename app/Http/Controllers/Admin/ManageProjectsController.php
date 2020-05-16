<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyManageProjectRequest;
use App\Http\Requests\StoreManageProjectRequest;
use App\Http\Requests\UpdateManageProjectRequest;
use App\ManageProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageProjectsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageProjects = ManageProject::all();

        return view('admin.manageProjects.index', compact('manageProjects'));
    }

    public function create()
    {
        abort_if(Gate::denies('manage_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageProjects.create');
    }

    public function store(StoreManageProjectRequest $request)
    {
        $manageProject = ManageProject::create($request->all());

        return redirect()->route('admin.manage-projects.index');
    }

    public function edit(ManageProject $manageProject)
    {
        abort_if(Gate::denies('manage_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageProjects.edit', compact('manageProject'));
    }

    public function update(UpdateManageProjectRequest $request, ManageProject $manageProject)
    {
        $manageProject->update($request->all());

        return redirect()->route('admin.manage-projects.index');
    }

    public function show(ManageProject $manageProject)
    {
        abort_if(Gate::denies('manage_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageProjects.show', compact('manageProject'));
    }

    public function destroy(ManageProject $manageProject)
    {
        abort_if(Gate::denies('manage_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageProject->delete();

        return back();
    }

    public function massDestroy(MassDestroyManageProjectRequest $request)
    {
        ManageProject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
