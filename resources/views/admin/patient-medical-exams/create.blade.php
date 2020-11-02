@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.patient-medical-exams.title_singular') }}
    </div>

    <div class="card-body">
        <form  action="{{ route("admin.patient-medical-exams.store", ['id' => $patient_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="hidden" name="patient_id" value="{{$patient_id}}">
                <label for="permissions">{{ trans('global.patient-medical-exams.fields.name') }}</label>
                <select name="name[]" id="name" class="form-control select2" multiple>
                    @foreach($medicalExams as $id => $medicalExam)
                        <option value="{{ $medicalExam->id }}" }}>
                            {{ $medicalExam->name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient-medical-exams.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('global.patient-medical-exams.fields.date') }}</label>
                <input type="date" id="date" required name="date" max="{{ date('Y-m-d')  }}" class="form-control ">{{ old('date', isset($patient) ? $patient->date : '') }}</input>
                @if($errors->has('date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient-medical-exams.fields.date_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                <input id="file" type="file" name="file" required >
                @if($errors->has('file'))
                    <em class="invalid-feedback">
                        {{ $errors->first('file') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient-medical-exams.fields.file_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
