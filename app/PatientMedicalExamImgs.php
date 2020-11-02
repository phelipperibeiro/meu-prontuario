<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMedicalExamImgs extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'patient_medical_exams_id',
        'filename',
        'created_at'
    ];

    public function MedicalExams()
    {
        return $this->hasOne(PatientMedicalExams::class);
    }
}
