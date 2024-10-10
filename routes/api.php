<?php

use App\Http\Controllers\FurnitureController;

Route::get('furniture', [FurnitureController::class, 'index']);
Route::get('furniture/{id}', [FurnitureController::class, 'show']);
Route::post('furniture', [FurnitureController::class, 'store']);
Route::put('furniture/{id}', [FurnitureController::class, 'update']);
Route::delete('furniture/{id}', [FurnitureController::class, 'destroy']);
