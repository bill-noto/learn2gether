<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Language;
use App\Models\Meeting;
use App\Models\Post;
use App\Models\User;
use App\Models\UserRatio;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PagesController extends Controller
{

    /*
     * Main Index page of application, home page. Bringing login and register props from jetstream, plus all users for testimonials
     * section.
     */

    public function index()
    {
        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'users' => User::where('role', '!=' ,'admin')->get()
        ]);
    }

    /*
     * About page of application, bringing login and register props from jetstream.
     */

    public function about()
    {
        return Inertia::render('About', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /*
     * Contact page of application, bringing login and register props from jetstream.
     */

    public function contact()
    {
        return Inertia::render('Contact', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /*
     * Main Forum page of application, bringing login and register props from jetstream. Brings posts, comments and logged in user at
     * the moment as props for use in the forum section.
     */

    public function forum()
    {
        return Inertia::render('Forum', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'posts' => Post::all(),
            'comments' => Comment::all(),
        ]);
    }

    /*
     * Main Host page of application, bringing login and register props from jetstream. Bringing hosts from users, rat, from ratio
     * and lang from language table.
     */

    public function hosts()
    {
        return Inertia::render('Hosts', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'hosts' => User::where('role', 'host')->get(),
            'lang' => Language::all(),
        ]);
    }

    /*
    * Main Host page of application, bringing login and register props from jetstream. Bringing hosts from users, rat, from ratio
    * and lang from language table.
    */

    public function meeting($id)
    {
        return Inertia::render('Meeting', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'meeting' => Meeting::find($id)
        ]);
    }
}
