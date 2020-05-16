@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.assethandover.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assethandovers.update", [$assethandover->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="empid_id">{{ trans('cruds.assethandover.fields.empid') }}</label>
                <select class="form-control select2 {{ $errors->has('empid') ? 'is-invalid' : '' }}" name="empid_id" id="empid_id" required>
                    @foreach($empids as $id => $empid)
                        <option value="{{ $id }}" {{ ($assethandover->empid ? $assethandover->empid->id : old('empid_id')) == $id ? 'selected' : '' }}>{{ $empid }}</option>
                    @endforeach
                </select>
                @if($errors->has('empid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('empid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.empid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="assets">{{ trans('cruds.assethandover.fields.assets') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('assets') ? 'is-invalid' : '' }}" name="assets[]" id="assets" multiple>
                    @foreach($assets as $id => $assets)
                        <option value="{{ $id }}" {{ (in_array($id, old('assets', [])) || $assethandover->assets->contains($id)) ? 'selected' : '' }}>{{ $assets }}</option>
                    @endforeach
                </select>
                @if($errors->has('assets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assets') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.assets_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.assethandover.fields.exitemailrec') }}</label>
                <select class="form-control {{ $errors->has('exitemailrec') ? 'is-invalid' : '' }}" name="exitemailrec" id="exitemailrec" required>
                    <option value disabled {{ old('exitemailrec', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Assethandover::EXITEMAILREC_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('exitemailrec', $assethandover->exitemailrec) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('exitemailrec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exitemailrec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.exitemailrec_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.assethandover.fields.allassets') }}</label>
                <select class="form-control {{ $errors->has('allassets') ? 'is-invalid' : '' }}" name="allassets" id="allassets" required>
                    <option value disabled {{ old('allassets', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Assethandover::ALLASSETS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('allassets', $assethandover->allassets) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('allassets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('allassets') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.allassets_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="addeactivationdate">{{ trans('cruds.assethandover.fields.addeactivationdate') }}</label>
                <input class="form-control date {{ $errors->has('addeactivationdate') ? 'is-invalid' : '' }}" type="text" name="addeactivationdate" id="addeactivationdate" value="{{ old('addeactivationdate', $assethandover->addeactivationdate) }}">
                @if($errors->has('addeactivationdate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('addeactivationdate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.addeactivationdate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="approvals">{{ trans('cruds.assethandover.fields.approvals') }}</label>
                <div class="needsclick dropzone {{ $errors->has('approvals') ? 'is-invalid' : '' }}" id="approvals-dropzone">
                </div>
                @if($errors->has('approvals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approvals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.approvals_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="itapprovaldate">{{ trans('cruds.assethandover.fields.itapprovaldate') }}</label>
                <input class="form-control date {{ $errors->has('itapprovaldate') ? 'is-invalid' : '' }}" type="text" name="itapprovaldate" id="itapprovaldate" value="{{ old('itapprovaldate', $assethandover->itapprovaldate) }}">
                @if($errors->has('itapprovaldate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('itapprovaldate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.itapprovaldate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.assethandover.fields.comment') }}</label>
                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{{ old('comment', $assethandover->comment) }}</textarea>
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assethandover.fields.comment_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedApprovalsMap = {}
Dropzone.options.approvalsDropzone = {
    url: '{{ route('admin.assethandovers.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="approvals[]" value="' + response.name + '">')
      uploadedApprovalsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedApprovalsMap[file.name]
      }
      $('form').find('input[name="approvals[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($assethandover) && $assethandover->approvals)
          var files =
            {!! json_encode($assethandover->approvals) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="approvals[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection