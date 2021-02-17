<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RatingController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication Token Route
Route::post('sanctum/token', UserTokenController::class);

// Routes with Auth protection
Route::middleware(['auth:sanctum'])->group(function () {

    // Routes for Send Emails
    Route::post('/newsletters', [NewsletterController::class, 'sendNewsletter']);
    Route::post('/emailVerify', [NewsletterController::class, 'sendEmailVerificationReminder']);

    // Rating Resources Routes
    Route::post('/products/{product}/rate', [RatingController::class, 'ratingProduct']);
    Route::post('/products/{product}/unrate', [RatingController::class, 'unratingProduct']);
    Route::post('/users/{user}/rate', [RatingController::class, 'ratingUser']);
    Route::post('/users/{user}/unrate', [RatingController::class, 'unratingUser']);

    // Resources Routes
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
});