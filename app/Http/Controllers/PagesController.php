<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index(User $users)
    {
        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'users' => $users->get()
        ]);
    }

    public function about()
    {
        return Inertia::render('About', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function forum()
    {
        return Inertia::render('Forum');
    }

    public function hosts()
    {
        return Inertia::render('Hosts');
    }
}
