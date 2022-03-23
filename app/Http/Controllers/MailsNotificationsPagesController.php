<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MailsNotificationsPagesController extends Controller
{
    public function subscribe()
    {
        if (Request::post('email') != '') {
            $user = Request::post('email');
            Mail::to($user)
                ->send(new Newsletter());
        }
        return Redirect::back();
    }

    public function unsubscribe()
    {
        return Inertia::render('Unsubscribe');
    }

    public function contacted()
    {
        if (Request::post('email') != '') {
            $user = Request::post('email');
            Mail::to($user)
                ->send(new Contact());
        }
        return Redirect::back();
    }
}
