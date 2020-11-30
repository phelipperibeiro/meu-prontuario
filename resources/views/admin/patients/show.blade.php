@extends('layouts.admin')
@section('content')

@can('patient_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.patient-medical-exams.create", ['id'=> $patient->id]) }}">
                {{ trans('global.add') }} {{ trans('global.patient-medical-exams.title_singular') }}
            </a>
        </div>
    </div>
@endcan
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
                        {{ trans('global.patient.fields.rg') }}
                    </th>
                    <td>
                        {!! $patient->rg !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.cpf') }}
                    </th>
                    <td>
                        ${{ $patient->cpf }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('global.patient-medical-exams.fields.name') }}
                    </th>
                    <th>
                        {{ trans('global.patient-medical-exams.fields.date') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($medicalExams as $key => $medicalExam)

                    <tr data-entry-id="{{ $medicalExam->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $medicalExam->name ?? '' }}
                        </td>
                        <td>
                            {{ $medicalExam->date ?? '' }}
                        </td>
                        <td>
                            @can('patient_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.patient-medical-exams.show', ['id' => $medicalExam->patientMedicalExam]) }}">
                                    {{ trans('global.viewExam') }}
                                </a>
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
