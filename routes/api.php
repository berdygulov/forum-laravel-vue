<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SubjectController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::group([
    'prefix' => 'chapters',
], function () {
    Route::get('/',[ChapterController::class, 'index']);
    Route::post('/',[ChapterController::class, 'store']);
    Route::get('/{chapter_id}/show',[ChapterController::class, 'show']);
    Route::post('/{chapter_id}/update',[ChapterController::class, 'update']);
    Route::get('/{chapter_id}/destroy',[ChapterController::class, 'destroy']);
});

Route::group([
    'prefix' => 'subjects',
], function () {
    Route::get('/',[SubjectController::class, 'index']);
    Route::post('/',[SubjectController::class, 'store']);
    Route::get('/{subject_id}/show',[SubjectController::class, 'show']);
    Route::get('/{subject_id}/destroy',[SubjectController::class, 'destroy']);
//    Route::post('/{subject_id}/update',[SubjectController::class, 'update']);
});
