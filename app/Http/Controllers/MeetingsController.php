<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class MeetingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('MeetingsIndex', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'meetings' => Meeting::all(),
            'who' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create($id)
    {
        return Inertia::render('MeetingCreate', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'host' => User::find($id),
            'who' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_time_of_meeting' => 'required'
        ]);

        Meeting::create($request->all());

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        return Inertia::render('MeetingShow', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'meeting' => Meeting::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Meeting::destroy($id);

        return back();
    }
}
