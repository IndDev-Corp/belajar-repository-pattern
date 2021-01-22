<?php

use App\Http\Controllers\Api\FinanceCategoryController;
use App\Http\Controllers\Api\FinanceController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // FINANCE CATEGORY
    Route::get('finance-categories/default', [FinanceCategoryController::class, 'getByDefault']);
    Route::get('finance-categories/by-user-id/{user_id}', [FinanceCategoryController::class, 'getByUserId']);
    Route::apiResource('finance-categories', FinanceCategoryController::class);

    // FINANCE
    Route::apiResource('finances', FinanceController::class);

    // BUSINESS
    Route::apiResource('business', BusinessController::class);

    // CUSTOMER
    Route::apiResource('customers', CustomerController::class);

    // PRODUCT CATEGORY
    Route::apiResource('product-categories', ProductCategoryController::class);

    // PRODUCT
    Route::apiResource('products', ProductController::class);
});
