<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\MedicalExams;
use App\PatientMedicalExams;
use App\PatientMedicalExamImgs;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;


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


    public function displayImage($filename)
    {
        $filename = str_replace("_", "/", $filename);

        $path = storage_path('app/'.$filename);

        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = response()->make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function store(Request $request)
    {
        //abort_unless(\Gate::allows('patient_create'), 403);

        $medicalExamsIds = $request->get('name');
        $patient_id = $request->get('patient_id');
        $file = $request->file('file');
        $filename = $file->store("public/imgs/$patient_id");

        foreach ($medicalExamsIds as $medicalExamsId) {

            $data = ['date_medical_exam' => $request->get('date') , 'patient_id' => $patient_id, 'medical_exams_id' => $medicalExamsId];

            $patientMedicalExams = PatientMedicalExams::create($data);

            PatientMedicalExamImgs::create([
                'patient_medical_exams_id' => $patientMedicalExams->id,
                'filename' => $filename
            ]);

        }

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


    public function show($patientMedicalExamsId)
    {
        //abort_unless(\Gate::allows('patient_show'), 403);

        $patientMedicalExamImg = PatientMedicalExamImgs::where('patient_medical_exams_id',$patientMedicalExamsId)->first();

        //$filename = str_replace('public/', '', $patientMedicalExamImg->filename);
        $filename = $patientMedicalExamImg->filename;
        $filename = str_replace("/", "_", $filename);

        return view('admin.patient-medical-exams.show', ['filename' => $filename]);
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
