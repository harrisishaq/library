@extends('layouts.app')

@section('page-heading', $edit ? 'Edit Author' : __('Add Author'))

@section('content')

@include('partials.messages')

<section class="content">
    <div class="row">
        <div class="col-12">
            @if ($edit)
                {!! Form::open(['url' => 'mdata/author/'.$data->id.'/edit', 'method' => 'PUT', 'id' => 'form']) !!}
            @else
                {!! Form::open(['url' => 'mdata/author/create', 'id' => 'form']) !!}
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="card-title">
                                <strong>
                                    @lang('Author Detail')
                                </strong>
                            </h5>
                            <p class="description text-sm">
                                <br>
                                @lang('General information about Author data.')
                            </p>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">@lang('Author Name')</label>
                                <input type="text" class="form-control input-solid" id="name" name="name" placeholder="@lang('Author Name')" value="{{ $edit ? $data->name : old('name') }}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="country">@lang('Country')</label>
                                <input type="text" class="form-control input-solid" id="country" name="country" placeholder="@lang('Country')" value="{{ $edit ? $data->country : old('country') }}" required autocomplete="off">
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

