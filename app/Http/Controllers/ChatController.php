<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Chat::create($request->all());

        return back();
    }

}
