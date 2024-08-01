<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api','prefix' => 'auth'], function () {
    Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class,'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class,'me']);
});

Route::middleware(['jwt.auth', 'role:admin,teacher,reception'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('students', StudentController::class);
    Route::apiResource('skills', SkillController::class);
    Route::apiResource('rooms', RoomController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('educations', \App\Http\Controllers\EducationController::class);

    Route::post('courses/{course}/add-student', [CourseController::class, 'addToCourse']);
    Route::post('teachers/{teacher}/add-course', [TeacherController::class, 'addCourseToTeacher']);
});


