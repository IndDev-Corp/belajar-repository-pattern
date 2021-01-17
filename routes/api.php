<?php

use App\Http\Controllers\Api\FinanceCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('finance-categories/default', [FinanceCategoryController::class, 'getByDefault']);
    Route::get('finance-categories/by-user-id/{user_id}', [FinanceCategoryController::class, 'getByUserId']);
    Route::apiResource('finance-categories', FinanceCategoryController::class);
});
