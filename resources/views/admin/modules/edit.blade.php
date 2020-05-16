@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.module.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.modules.update", [$module->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="module">{{ trans('cruds.module.fields.module') }}</label>
                <input class="form-control {{ $errors->has('module') ? 'is-invalid' : '' }}" type="text" name="module" id="module" value="{{ old('module', $module->module) }}" required>
                @if($errors->has('module'))
                    <div class="invalid-feedback">
                        {{ $errors->first('module') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.module.fields.module_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="desc">{{ trans('cruds.module.fields.desc') }}</label>
                <input class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" type="text" name="desc" id="desc" value="{{ old('desc', $module->desc) }}" required>
                @if($errors->has('desc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.module.fields.desc_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="projectid_id">{{ trans('cruds.module.fields.projectid') }}</label>
                <select class="form-control select2 {{ $errors->has('projectid') ? 'is-invalid' : '' }}" name="projectid_id" id="projectid_id" required>
                    @foreach($projectids as $id => $projectid)
                        <option value="{{ $id }}" {{ ($module->projectid ? $module->projectid->id : old('projectid_id')) == $id ? 'selected' : '' }}>{{ $projectid }}</option>
                    @endforeach
                </select>
                @if($errors->has('projectid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('projectid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.module.fields.projectid_helper') }}</span>
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