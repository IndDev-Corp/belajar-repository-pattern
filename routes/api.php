<?php

use App\Http\Controllers\Api\FinanceCategoryController;
use App\Http\Controllers\Api\FinanceController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // FINANCE CATEGORY
    Route::get('finance-categories/default', [FinanceCategoryController::class, 'getByDefault']);
    Route::get('finance-categories/by-user-id/{user_id}', [FinanceCategoryController::class, 'getByUserId']);
    Route::apiResource('finance-categories', FinanceCategoryController::class);

    // FINANCE
    Route::apiResource('finance', FinanceController::class);

    // BUSINESS
    Route::apiResource('business', BusinessController::class);

    // CUSTOMER
    Route::apiResource('customer', CustomerController::class);
});
