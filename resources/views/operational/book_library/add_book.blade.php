@extends('layouts.app')
@section('page-heading', __('List Book'))

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset(('bootstrap/css/bootstrap.min.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/css/core/menu/menu-types/vertical-menu.min.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/css/core/colors/palette-gradient.min.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/vendors/css/tables/datatable/datatables.min.css')) }}">
<style type="text/css">
  .datepicker{z-index:1151;}
</style>

<style type="text/css">
  table.fixed td {overflow:hidden;}/*Hide text outside the cell.*/
  table.fixed td:nth-of-type(8) {width:80px;}/*Setting the width of column 1.*/
</style>
@endsection


@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      @include('partials.messages')
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-striped table-borderless fixed" id="datatable">
              <thead>
                <tr>
                  <th style="text-align:center">ISBN</th>
                  <th style="text-align:center">Title</th>
                  <th style="text-align:center">Author</th>
                  <th style="text-align:center">Publisher</th>
                  <th style="text-align:center">Year Release</th>
                  <th style="text-align:center;min-width:65px">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($data))
                  @foreach ($data as $d)
                  <tr>
                    <td style="text-align:center">{{ $d->isbn }}</td>
                    <td style="text-align:center">{{ $d->title }}</td>
                    <td style="text-align:center">{{ $d->authorBook->name }}</td>
                    <td style="text-align:center">{{ $d->publisherBook->name }}</td>
                    <td style="text-align:center">{{ $d->year }}</td>
                    <td style="text-align:center">
                      <a class="btn-sm bg-success font-weight-bold mr-1 mb-1" href="{{ route('operational.book_library.create', [$d->id, $library->id]) }}" data-toggle="tooltip" data-placement="top" title="Add">
                      Add
                    </a>
                    </td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="6"><em>@lang('No records found.')</em></td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('scripts')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>
<script>
  $(document).ready(function() {
    $("#datatable").DataTable({
      "autoWidth": false,
    });
  });
</script>
<!-- <script src="sweetalert2.all.min.js"></script> -->
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script type="text/javascript">
  $('#form-delete').on('submit', function(e){
    var form = this;
    e.preventDefault();
    swal({
      title: 'Hapus data ?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.value) {
        return form.submit();
      }
    })
});
</script> -->
@endsection
