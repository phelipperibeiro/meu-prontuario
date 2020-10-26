<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('patient_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'rg' => [
                'required',
            ],
            'cpf' => [
                'required',
            ],
        ];
    }
}
