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

    public function contacted(Request $request)
    {
        $rand = rand(1, 1000);

        if ($request->post() != '') {
            $recipient = $request->post('email');
            $user = $request->all();
            Mail::to($recipient)
                ->send(new Contact($rand, $user));
        }
        return Redirect::back();
    }
}
