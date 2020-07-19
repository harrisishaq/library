@extends('layouts.app')

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{ asset(('plugins/select2/css/select2.min.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')) }}">
@stop

@section('page-heading', $edit ? 'Edit Book' : __('Add Book'))

@section('content')

@include('partials.messages')

<section class="content">
    <div class="row">
        <div class="col-12">
@if ($edit)
    {!! Form::open(['url' => 'mdata/book/'.$data->id.'/edit', 'method' => 'PUT', 'id' => 'form']) !!}
@else
    {!! Form::open(['url' => 'mdata/book/create', 'id' => 'form']) !!}
@endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card-title">
                              <h5>
                                <strong>
                                    @lang('Book Detail')
                                </strong>
                              </h5>
                              <p class="description text-sm">
                                @lang('General information about Book data.')
                              </p>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="isbn">@lang('ISBN')</label>
                                <input type="hidden" name="id" id="id" value="{{ $edit ? $data->id : old('id') }}">
                                <input type="text" class="form-control input-solid" id="nim" name="isbn" placeholder="@lang('ISBN')" value="{{ $edit ? $data->isbn : old('isbn') }}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="nama">@lang('Titles')</label>
                                <input type="text" class="form-control input-solid" id="title" name="title" placeholder="@lang('Title')" value="{{ $edit ? $data->title : old('title') }}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="penerbit">@lang('Author')</label>
                                <select class="form-control select2" name="authors_id" style="width: 100%; height: auto;">
                                    <option selected value="">Select Author</option>
                                    @foreach ($author as $d)
                                        <option value="{{ $d->id }}" {{ $edit ? ($d->id == $data->authors_id ? 'selected' : '') : '' }} >{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">@lang('Publisher')</label>
                                <select class="form-control select2" name="publishers_id" style="width: 100%; height: auto;">
                                    <option selected value="">Select Publisher</option>
                                    @foreach ($publisher as $d)
                                        <option value="{{ $d->id }}" {{ $edit ? ($d->id == $data->publishers_id ? 'selected' : '') : '' }} >{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">@lang('Year Release')</label>
                                <input type="text" class="form-control input-solid" id="year" name="year" placeholder="@lang('Year Release')" value="{{ $edit ? $data->year : old('year') }}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="status">@lang('Status')</label>
                                <select class="form-control input-solid" id="status" name="status" required>
                                    <option value="">-- Select --</option>
                                    <option value="1" {{ $edit ? ($data->status == 1 ? 'selected' : '') : '' }}>Active</option>
                                    <option value="0" {{ $edit ? ($data->status == 0 ? 'selected' : '') : '' }}>Non-Active</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-left">
                                {{ __($edit ? 'Update' : 'Create') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
@section('scripts')
<script src="{{ asset (('plugins/select2/js/select2.full.min.js')) }}"></script>
<!-- <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('stok_terpinjam').setAttribute("value", 0);
    }, false);
</script> -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
    })
</script>
@endsection
