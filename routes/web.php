<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('patients/destroy', 'PatientsController@massDestroy')->name('patients.massDestroy');

    Route::resource('patients', 'PatientsController');

    Route::delete('patient-medical-exams/destroy', 'PatientMedicalExamsController@massDestroy')->name('exams.massDestroy');

    Route::get('patient-medical-exams/patient/{id}/create', 'PatientMedicalExamsController@create')->name('patient-medical-exams.create');
    Route::post('patient-medical-exams/patient/{id}/store', 'PatientMedicalExamsController@store')->name('patient-medical-exams.store');

    //Route::post('patient-medical-exam-imgs/patient/{id}/upload', 'PatientMedicalExamImgsController@upload')->name('patient-medical-exam-imgs.upload');
    //Route::get('patient-medical-exams-img', 'UploadController@uploadForm');
    //Route::post('patient-medical-exams-img', 'PatientMedicalExamsImgController@store');

});
