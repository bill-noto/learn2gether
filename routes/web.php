<?php

use App\Http\Controllers\MailsNotificationsPagesController;
use App\Http\Controllers\PagesController;
use App\Mail\Newsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


/*
 * Routes for pages without need of authorization
 */

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/hosts', [PagesController::class, 'hosts'])->name('hosts');
Route::get('/forum', [PagesController::class, 'forum'])->name('forum');

/*
 * Routes for newsletter and contact page
 */

Route::post('/nlt', [MailsNotificationsPagesController::class, 'subscribe']);
Route::get('/usbc', [MailsNotificationsPagesController::class, 'unsubscribe']);
Route::post('/ctc', [MailsNotificationsPagesController::class, 'contacted']);

/*
 * Routes with need of authorization
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
