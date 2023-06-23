<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/upload', [\App\Http\Controllers\ImageController::class, 'upload']);
Route::post('/uploadSignature', [\App\Http\Controllers\ImageController::class, 'uploadSignature']);

Route::post('/createApplicant', [\App\Http\Controllers\ApplicantController::class, 'create']);

Route::post('/storeResearchHistory', [\App\Http\Controllers\ResearchController::class, 'create']);

Route::post('/storeProposedResearch', [\App\Http\Controllers\ProposedResearchController::class, 'create']);

Route::post('/addApplicantEducation', [\App\Http\Controllers\ApplicantEducationController::class, 'create']);
Route::post('/addApplicantEmployment', [\App\Http\Controllers\ApplicantEmploymentController::class, 'create']);