<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\LogsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// --- Direct redirects ---
Route::get('/', fn() => redirect(app()->getLocale() . '/home'));
Route::get('/home', fn() => redirect(app()->getLocale() . '/home'));
Route::get('/discord', fn() => redirect('https://discord.com/invite/PryKE2Xvrh'));
Route::get('/startup', fn() => redirect('/' . app()->getLocale() . '/startup'));
Route::post('/mail/receive', [App\Http\Controllers\Mails\MailController::class, 'receiveMail']);
Route::get('language/set/{language}', [App\Http\Controllers\LanguageController::class, 'index']);

// --- Routes with locale and middleware ---
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-z]{2}-[a-z]{2}'],
    'middleware' => 'setlocale'
], function () {

    // --- Auth ---
    Auth::routes();
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

    // --- Home ---
    Route::get('/', fn() => redirect(app()->getLocale() . '/home'));
    Route::get('/home', fn() => view('welcome')->with(['currentPage' => 'home']));

    // --- Projects ---
    Route::get('projects', [App\Http\Controllers\Projects\ProjectsController::class, 'index']);

    // --- User Profile ---
    Route::prefix('user')->group(function () {
        Route::get('{id}', [App\Http\Controllers\User\UserProfileController::class, 'index']);
        Route::get('me/edit', [App\Http\Controllers\User\UserProfileController::class, 'edit']);
        Route::post('me/save', [App\Http\Controllers\User\UserProfileController::class, 'save']);
    });

    // --- Tools ---
    Route::prefix('tools')->group(function () {
        Route::get('mensual_budget', [App\Http\Controllers\Tools\BudgetController::class, 'index']);
        Route::get('demo_unit', [App\Http\Controllers\Tools\TechnologyController::class, 'demounit']);
    });

    // --- Store ---
    Route::get('store', [App\Http\Controllers\StoreController::class, 'index']);

    // --- Management ---
    Route::prefix('management')->group(function () {
        Route::get('logs', [LogsController::class, 'index']);
        Route::get('logs/download/{filename}', [LogsController::class, 'download'])->name('management.logs.download');
    });

    // --- Miscellaneous ---
    Route::get('/startup', fn() => view('pages.startup')->with(['currentPage' => 'startup']));
    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index']);

    Route::get('/notifications', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications.index');
    })->name('notifications.index')->middleware('auth');
});