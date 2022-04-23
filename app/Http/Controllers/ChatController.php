<?php

namespace App\Http\Controllers;

use App\Events\ButtonPressed;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Chat::create($request->all());

        ButtonPressed::dispatch(Chat::get()->last());

        return back();
    }

}
