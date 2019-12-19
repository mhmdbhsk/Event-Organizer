<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Participant;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $events = DB::table('events')->get();
            return response()->json([
                'message' => 'Here you got',
                'data' => $events
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something Wrong',
                'data' => null
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $participant = Participant::find($id);
            $participants = DB::table('participants')
            ->join('users','participants.user_id','=','users.id')
            ->where('event_id', $id)
            ->join('events','participants.event_id','=','events.id')
            ->get(['event_id', 'name_event', 'location', 'description', 'date_start', 
                    'date_finish', 'quota', 'user_id', 'name', 'email']);
            return response()->json([
                'message' => 'Here All the Event',
                'data' => $participants
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something Wrong',
                'data' => null
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $participant = Participant::find($id);
            $participants = DB::table('participants')
            ->join('users','participants.user_id','=','users.id')
            ->where('user_id', $id)
            ->delete();
            return response()->json([
                'message' => 'Delete Success',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something Wrong',
            ], 400);
        }
        
    }
}
