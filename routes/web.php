<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DownloadController as AdminDownloadController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ExamResultController as AdminExamResultController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SchoolInfoController as AdminSchoolInfoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Newsletter Subscription
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Dynamic Pages Route - should be placed after all other specific routes
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show')->where('slug', '^(?!admin|news|categories|events|downloads|results|login|logout|api|newsletter).*$');

// Blog Routes
Route::get('/news', [PostController::class, 'index'])->name('posts.index');
Route::get('/news/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

// Events Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event:slug}', [EventController::class, 'show'])->name('events.show');



// Downloads Routes
Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/downloads/{download}', [DownloadController::class, 'download'])->name('downloads.download');

// Exam Results Routes
Route::get('/results', [ExamResultController::class, 'index'])->name('results.index');
Route::get('/results/{exam}/{year}', [ExamResultController::class, 'show'])->name('results.show');
Route::get('/results-summary', [ExamResultController::class, 'summary'])->name('results.summary');
Route::get('/visualize-data/{exam}/{year}', [ExamResultController::class, 'visualize'])->name('results.visualize');
Route::get('/overall-performance', [ExamResultController::class, 'overallPerformance'])->name('results.overall');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth','check.role'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Posts Management
    Route::resource('posts', AdminPostController::class);

    // Categories Management
    Route::resource('categories', AdminCategoryController::class);

    // Events Management
    Route::resource('events', AdminEventController::class);

    // Downloads Management
    Route::resource('downloads', AdminDownloadController::class);

    // Exam Results Management
    Route::resource('exam-results', AdminExamResultController::class);

    //User Routes
    Route::resource('users', UserController::class);

    //Fee routes

    Route::resource('fees', FeeController::class);

    // School Info Management
    Route::get('school-info', [AdminSchoolInfoController::class, 'edit'])->name('school-info.edit');
    Route::put('school-info', [AdminSchoolInfoController::class, 'update'])->name('school-info.update');

    // Pages Management
    Route::resource('pages', AdminPageController::class);
    Route::post('pages/{page}/sections', [AdminPageController::class, 'addSection'])->name('pages.sections.add');
    Route::put('pages/{page}/sections/{section}', [AdminPageController::class, 'updateSection'])->name('pages.sections.update');
    Route::delete('pages/{page}/sections/{section}', [AdminPageController::class, 'deleteSection'])->name('pages.sections.delete');
    Route::post('pages/{page}/sections/reorder', [AdminPageController::class, 'reorderSections'])->name('pages.sections.reorder');

    // Image Upload for CKEditor
    Route::post('upload-image', [App\Http\Controllers\Admin\ImageUploadController::class, 'upload'])->name('image.upload');

    // School Leadership Management
    Route::resource('leaders', App\Http\Controllers\Admin\LeaderController::class);
    Route::post('leaders/update-order', [App\Http\Controllers\Admin\LeaderController::class, 'updateOrder'])->name('leaders.update-order');

    // Welcome Message Management
    Route::resource('welcome-messages', App\Http\Controllers\Admin\WelcomeMessageController::class);
    Route::post('welcome-messages/{id}/set-active', [App\Http\Controllers\Admin\WelcomeMessageController::class, 'setActive'])->name('welcome-messages.set-active');

    //Messages routes

    Route::resource('messages', MessageController::class);
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
