@extends('layouts.admin')
@section('content')
@can('assethandover_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.assethandovers.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.assethandover.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.assethandover.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Assethandover">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.assethandover.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.assethandover.fields.empid') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.emp_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.assethandover.fields.assets') }}
                        </th>
                        <th>
                            {{ trans('cruds.assethandover.fields.exitemailrec') }}
                        </th>
                        <th>
                            {{ trans('cruds.assethandover.fields.allassets') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assethandovers as $key => $assethandover)
                        <tr data-entry-id="{{ $assethandover->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assethandover->id ?? '' }}
                            </td>
                            <td>
                                {{ $assethandover->empid->name ?? '' }}
                            </td>
                            <td>
                                {{ $assethandover->empid->emp_code ?? '' }}
                            </td>
                            <td>
                                @foreach($assethandover->assets as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ App\Assethandover::EXITEMAILREC_SELECT[$assethandover->exitemailrec] ?? '' }}
                            </td>
                            <td>
                                {{ App\Assethandover::ALLASSETS_SELECT[$assethandover->allassets] ?? '' }}
                            </td>
                            <td>
                                @can('assethandover_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.assethandovers.show', $assethandover->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('assethandover_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.assethandovers.edit', $assethandover->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('assethandover_delete')
                                    <form action="{{ route('admin.assethandovers.destroy', $assethandover->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('assethandover_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.assethandovers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Assethandover:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection