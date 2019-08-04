<?php

use Illuminate\Http\Request;
use HUAC\Http\Controllers\Api\Procedures\ProceduresController;
use HUAC\Http\Controllers\Api\Anesthetics\AnestheticsController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
    Route::get('procedures', [ProceduresController::class, 'all'])->name('api.procedures.index');
    Route::get('procedures/{procedure}', [ProceduresController::class, 'find'])->name('api.procedures.find');
    Route::get('anesthetics', [AnestheticsController::class, 'all'])->name('api.anesthetics.all');
    Route::get('anesthetics/{anesthesia}', [AnestheticsController::class, 'find'])->name('api.anesthetics.find');
});

