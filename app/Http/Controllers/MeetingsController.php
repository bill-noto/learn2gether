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
     * Display a listing of the resource, for a host.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $arr = [];
        foreach (Meeting::all() as $meeting) {
            if ($meeting->patron_id == $user->id || $meeting->host_id == $user->id) {
                $arr[] = $meeting;
            }
        }

        return Inertia::render('MeetingsIndex', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'meetings' => $arr
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
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        return Inertia::render('MeetingEdit', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'meeting' => Meeting::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Inertia\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_time_of_meeting' => 'required'
        ]);

        $meeting = Meeting::find($id);

        $meeting->update($request->all());

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function destroy($id)
    {
        Meeting::destroy($id);

        return $this->index();
    }
}
