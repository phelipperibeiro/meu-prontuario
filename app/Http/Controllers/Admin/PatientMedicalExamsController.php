<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\MedicalExams;
use App\PatientMedicalExams;

class PatientMedicalExamsController extends Controller
{
    public function index()
    {
        //abort_unless(\Gate::allows('patient_access'), 403);

        $patients = Patient::all();

        return view('admin.patient-medical-exams.index', compact('patients'));
    }

    public function create($patient_id)
    {
        //abort_unless(\Gate::allows('patient_create'), 403);

        $medicalExams = MedicalExams::all();

        $data = ['patient_id' => $patient_id, 'medicalExams'=> $medicalExams];

        return view('admin.patient-medical-exams.create', $data);
    }

    public function store(Request $request)
    {
        //abort_unless(\Gate::allows('patient_create'), 403);

        $data = ['date_medical_exam' => $request->get('date') , 'patient_id' => $request->get('patient_id'), 'medical_exams_id' => $request->get('name')];

        PatientMedicalExams::create($data);

        return redirect()->route('admin.patients.index');
    }

    public function edit(Patient $patient)
    {
        //abort_unless(\Gate::allows('patient_edit'), 403);

        return view('admin.patient-medical-exams.edit', compact('patient'));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //abort_unless(\Gate::allows('patient_edit'), 403);

        $patient->update($request->all());

        return redirect()->route('admin.patient-medical-exams.index');
    }

    public function show(Patient $patient)
    {
        //abort_unless(\Gate::allows('patient_show'), 403);

        return view('admin.patient-medical-exams.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        //abort_unless(\Gate::allows('patient_delete'), 403);

        $patient->delete();

        return back();
    }

    public function massDestroy(MassDestroyPatientRequest $request)
    {
        Patient::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
