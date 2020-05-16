@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assethandover.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assethandovers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.id') }}
                        </th>
                        <td>
                            {{ $assethandover->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.empid') }}
                        </th>
                        <td>
                            {{ $assethandover->empid->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.assets') }}
                        </th>
                        <td>
                            @foreach($assethandover->assets as $key => $assets)
                                <span class="label label-info">{{ $assets->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.exitemailrec') }}
                        </th>
                        <td>
                            {{ App\Assethandover::EXITEMAILREC_SELECT[$assethandover->exitemailrec] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.allassets') }}
                        </th>
                        <td>
                            {{ App\Assethandover::ALLASSETS_SELECT[$assethandover->allassets] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.addeactivationdate') }}
                        </th>
                        <td>
                            {{ $assethandover->addeactivationdate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.approvals') }}
                        </th>
                        <td>
                            @foreach($assethandover->approvals as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.itapprovaldate') }}
                        </th>
                        <td>
                            {{ $assethandover->itapprovaldate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.created_by') }}
                        </th>
                        <td>
                            {{ $assethandover->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $assethandover->updated_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assethandover.fields.comment') }}
                        </th>
                        <td>
                            {{ $assethandover->comment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assethandovers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection