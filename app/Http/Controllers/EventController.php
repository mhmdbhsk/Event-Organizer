<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Ramsey\Uuid\Uuid;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'name_event' => 'required|string|max:25',
                'location' => 'required|string|max:200',
                'description' => 'required|string|max:255',
                'date_start' => 'required|date',
                'date_finish' => 'required|date',
                'quota' => 'required|numeric',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);
    
            $event = new Event;

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $uuid4 = Uuid::uuid4();
                $name = $uuid4->toString().'.'.$image->getClientOriginalExtension();
                $destinationPath = storage_path('/app/public/photo');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $event->photo = $name;
            }

            $event->name_event = $request->name_event;
            $event->location = $request->location;
            $event->description = $request->description;
            $event->date_start = $request->date_start;
            $event->date_finish = $request->date_finish;
            $event->quota = $request->quota;
            $event->save();   
            return redirect('admin/events')->with('status', 'Sucessfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id);
        return view('admin.event.edit', compact('events'));
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
        $request->validate([
                'name_event' => 'required|string|max:25',
                'location' => 'required|string|max:200',
                'description' => 'required|string|max:255',
                'date_start' => 'required|date',
                'date_finish' => 'required|date',
                'quota' => 'required|numeric',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $event = Event::find($id);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $uuid4 = Uuid::uuid4();
            $name = $uuid4->toString().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/photo');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $event->photo = $name;
        }
        $event->name_event = $request->name_event;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->date_start = $request->date_start;
        $event->date_finish = $request->date_finish;
        $event->quota = $request->quota;
        $event->save();
        return redirect ('admin/events')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Event::find($id);
        $users -> delete();
        return redirect('/admin/events')->with('status', 'Data berhasil dihapus!');
    }
}
