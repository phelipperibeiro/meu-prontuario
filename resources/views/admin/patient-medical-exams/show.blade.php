@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.patient.title') }}
    </div>

    <div class="card-body">

{{--        //<img src="{{ url('storage/public/imgs/1/Ba0sUzVNym9lGHOtXFcAzk5ElwvHCaSIROWIItTm.jpeg') }}" alt="sdvsdv" title="" />--}}
        <img src="{{ route('admin.patient-medical-exams.displayImage', $filename) }}" alt="sdvsdv" title="">

    </div>
</div>

@endsection
