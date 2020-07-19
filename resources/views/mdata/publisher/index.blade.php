@extends('layouts.app')
@section('page-heading', __('Publisher'))

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
        <div class="card-header">
          <div class="card-tools">
            <div class="float-right">
              <div class="btn-group">
                <a class="btn bg-primary font-weight-bold mr-1 mb-1" href="{{ url('mdata/publisher/add') }}">
                  <i class="fas fa-plus mr-2"></i>
                  @lang(__(' Add Data'))
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-striped table-borderless fixed" id="datatable">
              <thead>
                <tr>
                  <th style="text-align:center">Publisher Code</th>
                  <th style="text-align:center">Name</th>
                  <th style="text-align:center">Country</th>
                  <th style="text-align:center">Status</th>
                  <th style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($data))
                  @foreach ($data as $d)
                  <tr>
                    <td style="text-align:center">{{ $d->publisher_code }}</td>
                    <td style="text-align:center">{{ $d->name }}</td>
                    <td style="text-align:center">{{ $d->country }}</td>
                    <td style="text-align:center">{{ $d->status ? 'Active' : 'Non-Active' }}</td>
                    <td style="text-align:center">
                      <a class="btn-sm bg-primary font-weight-bold mr-1 mb-1" href="{{ url('mdata/publisher/'.$d->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="btn-sm bg-danger font-weight-bold ml-1 mb-1" href="{{ url('mdata/publisher/'.$d->id.'/destroy') }}" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="fas fa-trash"></i>
                      </a>

                    </td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="5"><em>@lang('No records found.')</em></td>
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
@endsection
