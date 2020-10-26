@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.patient.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.name') }}
                    </th>
                    <td>
                        {{ $patient->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.description') }}
                    </th>
                    <td>
                        {!! $patient->rg !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.price') }}
                    </th>
                    <td>
                        ${{ $patient->cpf }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
