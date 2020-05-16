@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.module.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.modules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.module.fields.id') }}
                        </th>
                        <td>
                            {{ $module->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.module.fields.module') }}
                        </th>
                        <td>
                            {{ $module->module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.module.fields.desc') }}
                        </th>
                        <td>
                            {{ $module->desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.module.fields.projectid') }}
                        </th>
                        <td>
                            {{ $module->projectid->project ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.module.fields.created_by') }}
                        </th>
                        <td>
                            {{ $module->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.modules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection