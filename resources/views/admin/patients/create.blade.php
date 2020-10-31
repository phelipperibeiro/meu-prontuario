@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.patient.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.patients.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.patient.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($patient) ? $patient->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rg') ? 'has-error' : '' }}">
                <label for="rg">{{ trans('global.patient.fields.rg') }}</label>
                <input type="text" id="rg" name="rg" class="form-control ">{{ old('rg', isset($patient) ? $patient->rg : '') }}</input>
                @if($errors->has('rg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('rg') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient.fields.rg_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                <label for="cpf">{{ trans('global.patient.fields.cpf') }}</label>
                <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', isset($patient) ? $patient->cpf : '') }}">
                @if($errors->has('cpf'))
                    <em class="invalid-feedback">
                        {{ $errors->first('cpf') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient.fields.cpf_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
