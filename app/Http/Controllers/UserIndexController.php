<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Participant;
use Auth;
use DB;

class UserIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::get();
        return view('event', compact('event'));
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
        $user = Auth::user();
        $event = Event::find($id);
        $participant = Participant::where('event_id', $id)->get();
        $ket = Participant::where('user_id', $user->id)->get();
        return view('detailevent', compact('event', 'participant', 'ket'));
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
        $participant = Participant::find($id);
        $participant -> delete();
        return redirect('/user')->with('status', 'Sucessfully Cancel the Event');
    }

    public function daftar($id)
    {
        $user = Auth::user();
        $event = Event::find($id);
        $participant = Participant::where('event_id', $id)->get();
        $ket = Participant::where('user_id', $user->id)->get();
        $create = new Participant;
        $create->user_id = $user->id;
        $create->event_id = $event->id;
        $create->save();  
        return redirect('/user')->with('status', 'Sucessfully Join the Event');
    }

    public function myevent(){
        $participant = DB::table('participants')
        ->join('events', 'participants.event_id', '=', 'events.id')
        ->join('users', 'participants.user_id', '=','users.id')
        ->where('user_id','=',Auth::user()->id)
        ->select('events.*', 'participants.id as idparticipants')
        ->get();
        return view('myevent', compact('participant'));
    }

}

