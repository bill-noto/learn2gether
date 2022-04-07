<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class MailsNotificationsPagesController extends Controller
{
    /*
     * Send Email alerting subscription to newsletter.
     */

    public function subscribe(Request $request)
    {
        if ($request->post('email') != '') {
            $user = $request->post('email');
            Mail::to($user)
                ->send(new Newsletter());
        }
        return Redirect::back();
    }

    /*
     * Open component with message asking why user unsubscribed.
     */

    public function unsubscribe()
    {
        return Inertia::render('ServicePages/Unsubscribe', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /*
     * Send Email alerting email with contact request has been received, and give number of 'order'.
     */

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
