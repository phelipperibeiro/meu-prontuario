<?php

namespace App\Http\Requests;

use App\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPatientRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('patient_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:patients,id',
        ];
    }
}
