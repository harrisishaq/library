@extends('layouts.app')

@section('page-heading', $edit ? 'Edit Library' : __('Add Library'))

@section('content')

@include('partials.messages')

<section class="content">
    <div class="row">
        <div class="col-12">
            @if ($edit)
                {!! Form::open(['url' => 'mdata/library/'.$data->id.'/edit', 'method' => 'PUT', 'id' => 'form']) !!}
            @else
                {!! Form::open(['url' => 'mdata/library/create', 'id' => 'form']) !!}
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="card-title">
                                <strong>
                                    @lang('Library Detail')
                                </strong>
                            </h5>
                            <p class="description text-sm">
                                <br>
                                @lang('General information about Library data.')
                            </p>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">@lang('Library Name')</label>
                                <input type="text" class="form-control input-solid" id="name" name="name" placeholder="@lang('Library Name')" value="{{ $edit ? $data->name : old('name') }}" required autocomplete="off">
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

