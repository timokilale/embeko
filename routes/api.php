<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DownloadController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ExamResultController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SchoolInfoController;
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

// Public API Routes
Route::get('/school-info', [SchoolInfoController::class, 'index']);

// Posts API
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/posts/category/{category:slug}', [PostController::class, 'byCategory']);
Route::get('/posts/recent', [PostController::class, 'recent']);

// Categories API
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

// Events API
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{event:slug}', [EventController::class, 'show']);
Route::get('/events/upcoming', [EventController::class, 'upcoming']);
Route::get('/events/past', [EventController::class, 'past']);

// Downloads API
Route::get('/downloads', [DownloadController::class, 'index']);
Route::get('/downloads/{download}', [DownloadController::class, 'show']);

// Exam Results API
Route::get('/exam-results', [ExamResultController::class, 'index']);
Route::get('/exam-results/{exam}/{year}', [ExamResultController::class, 'show']);
Route::get('/exam-results/summary', [ExamResultController::class, 'summary']);

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {
    // Admin Posts API
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    // Admin Categories API
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    // Admin Events API
    Route::post('/events', [EventController::class, 'store']);
    Route::put('/events/{event}', [EventController::class, 'update']);
    Route::delete('/events/{event}', [EventController::class, 'destroy']);

    // Admin Downloads API
    Route::post('/downloads', [DownloadController::class, 'store']);
    Route::put('/downloads/{download}', [DownloadController::class, 'update']);
    Route::delete('/downloads/{download}', [DownloadController::class, 'destroy']);

    // Admin Exam Results API
    Route::post('/exam-results', [ExamResultController::class, 'store']);
    Route::put('/exam-results/{examResult}', [ExamResultController::class, 'update']);
    Route::delete('/exam-results/{examResult}', [ExamResultController::class, 'destroy']);

    // Admin School Info API
    Route::put('/school-info', [SchoolInfoController::class, 'update']);
});
