<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Patient;

class PatientsApiController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return $patients;
    }

    public function store(StorePatientRequest $request)
    {
        return Patient::create($request->all());
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        return $patient->update($request->all());
    }

    public function show(Patient $patient)
    {
        return $patient;
    }

    public function destroy(Patient $patient)
    {
        return $patient->delete();
    }
}
