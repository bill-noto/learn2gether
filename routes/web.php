<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MailsNotificationsPagesController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\PagesController;
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
 * Routes for meetings resource
 */

//Route::middleware(['auth:sanctum', 'verified'])->get('/meetings', [MeetingsController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/meetings/{id}/create', [MeetingsController::class, 'create']);


/*
    Route::get('/post/{id}', [PostsController::class, 'show']);
    Route::post('/post', [PostsController::class, 'store']);
    Route::get('/post/{id}/edit', [PostsController::class, 'edit']);
    Route::patch('/post/{id}', [PostsController::class, 'update']);
    Route::delete('/post/{id}', [PostsController::class, 'destroy']);
 */

//Route::resource('post', PostsController::class);


/*
 * Routes for the comment resource
 */

Route::post('cmt', [CommentsController::class, 'store']);
Route::delete('del/{id}', [CommentsController::class, 'destroy']);


/*
 * Routes for newsletter and contact page mail sending resources
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
