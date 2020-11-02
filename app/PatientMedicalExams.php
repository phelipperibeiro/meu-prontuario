<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMedicalExams extends Model
{

    protected $dates = [
        'created_at',
        'updated_at',
        'date_medical_exam',
        'deleted_at',
    ];

    protected $fillable = [
        'patient_id',
        'medical_exams_id',
        'date_medical_exam',
        'created_at',
        'updated_at'
    ];

    public function Patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function MedicalExams()
    {
        return $this->hasOne(MedicalExams::class);
    }

    public function PatientMedicalExamsImg()
    {
        return $this->hasMany(PatientMedicalExamsImg::class);
    }
}
