<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMedicalExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('patient_medical_exams')) {
            Schema::create('patient_medical_exams', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('patient_id');
                $table->unsignedInteger('medical_exams_id');
                $table->timestamp('date_medical_exam')->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('patient_id')->references('id')->on('patients');
                $table->foreign('medical_exams_id')->references('id')->on('medical_exams');
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
        Schema::dropIfExists('patient_medical_exams');
    }
}
