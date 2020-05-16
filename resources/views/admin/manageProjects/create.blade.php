@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.manageProject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.manage-projects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="project">{{ trans('cruds.manageProject.fields.project') }}</label>
                <input class="form-control {{ $errors->has('project') ? 'is-invalid' : '' }}" type="text" name="project" id="project" value="{{ old('project', '') }}" required>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.manageProject.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="desc">{{ trans('cruds.manageProject.fields.desc') }}</label>
                <input class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" type="text" name="desc" id="desc" value="{{ old('desc', '') }}" required>
                @if($errors->has('desc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.manageProject.fields.desc_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection