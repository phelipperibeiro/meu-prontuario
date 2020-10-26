<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPatientRequest;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Patient;

class PatientsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('patient_access'), 403);

        $patients = Patient::all();

        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('patient_create'), 403);

        return view('admin.patients.create');
    }

    public function store(StorePatientRequest $request)
    {
        abort_unless(\Gate::allows('patient_create'), 403);

        $patient = Patient::create($request->all());

        return redirect()->route('admin.patients.index');
    }

    public function edit(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_edit'), 403);

        return view('admin.patients.edit', compact('patient'));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        abort_unless(\Gate::allows('patient_edit'), 403);

        $patient->update($request->all());

        return redirect()->route('admin.patients.index');
    }

    public function show(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_show'), 403);

        return view('admin.patients.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_delete'), 403);

        $patient->delete();

        return back();
    }

    public function massDestroy(MassDestroyPatientRequest $request)
    {
        Patient::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
