<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMedicalExamImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('patient_medical_exam_imgs')) {
            Schema::create('patient_medical_exam_imgs', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('patient_medical_exams_id');
                $table->string('filename');
                $table->timestamps();
                $table->foreign('patient_medical_exams_id')->references('id')->on('patient_medical_exams');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_medical_exam_imgs');
    }
}
