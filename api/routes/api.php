<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\UserTokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication Token Route
Route::post('sanctum/token', UserTokenController::class);

// Routes for Send Emails
Route::post('/newsletters', [NewsletterController::class, 'sendNewsletter'])
    ->middleware('auth:sanctum');
Route::post('/emailVerify', [NewsletterController::class, 'sendEmailVerificationReminder'])
    ->middleware('auth:sanctum');

// Resources Routes
Route::resource('categories', CategoryController::class)
    ->middleware('auth:sanctum');
Route::resource('products', ProductController::class)
    ->middleware('auth:sanctum');