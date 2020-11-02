<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\PatientMedicalExamImgs;
use App\PatientMedicalExams;

class PatientMedicalExamImgsController extends Controller
{
    public function upload(Request $request)
    {


        dd($request->all());

//        $medicalExamId = $request->get('name');
//        $dateMedicalExam = $request->get('date');
//
//
//        $imgs = [];
//        foreach ($request->file('imgs') as $img) {
//            $filename = $img->store("imgs/$patient_id");
//
//            $patient_medical_exams = PatientMedicalExams::firstOrCreate([
//                'medical_exams_id' => $medicalExamId,
//                'patient_id' => $patient_id,
//                'date_medical_exam' => $dateMedicalExam
//            ]);
//
//            $product_photo = PatientMedicalExamImgs::create([
//                'patient_medical_exams_id' => $patient_medical_exams->id,
//                'filename' => $filename
//            ]);
//
//            $photo_object = new \stdClass();
//            $photo_object->name = str_replace("imgs/$patient_id/", '', $img->getClientOriginalName());
//            $photo_object->size = round(Storage::size($filename) / 1024, 2);
//            $photo_object->fileID = $product_photo;
//            $imgs[] = $photo_object;
//        }
//
//        return response()->json(array('files' => $imgs), 200);
    }
}
