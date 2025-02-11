@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('product_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.products.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Product', 'route' => 'admin.products.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.condition') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.purchase_price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.sale_price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.source_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.sold') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.active') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.featured') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.deleted_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                    <tr data-entry-id="{{ $product->id }}">
                                        <td>
                                            @foreach($product->photos as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $product->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->category->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($product->conditions as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $product->purchase_price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->sale_price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->source_url ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $product->sold ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $product->sold ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $product->code ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $product->active ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $product->active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $product->featured ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $product->featured ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $product->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('product_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.products.show', $product->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('product_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.products.edit', $product->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('product_delete')
                                                <form action="{{ route('frontend.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.products.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 8, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection