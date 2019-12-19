<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        try {
            $events = Event::all();
            return response()->json([
                'message' => 'Here you got',
                'data' => $events
            ],200);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            try {
                $message =[

                ];

                $validate = Validator::make($request->all(), [
                    'name_event' => 'required|string|max:25',
                    'location' => 'required|string|max:200',
                    'description' => 'required|string|max:255',
                    'date_start' => 'required|date',
                    'date_finish' => 'required|date',
                    'quota' => 'required|numeric',
                    'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ], $message);
        
                if($validate->fails()){
                    $this->data['message'] = 'error';
                    $this->data['error'] = $validate->errors();
                    return $this->data;
                }

                $event = new Event;
    
                if ($request->hasFile('photo')) {
                    $image = $request->file('photo');
                    $uuid4 = Uuid::uuid4();
                    $name = $uuid4->toString().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/img/event');
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
                return response()->json([
                    'message' => 'Success Add',
                    'data' => $event
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something Wrong',
                    'data' => null
                ], 400);
            }
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
        try {
            $message =[

            ];
    
            $validate = Validator::make($request->all(), [
                'name_event' => 'required|string|max:25',
                'location' => 'required|string|max:200',
                'description' => 'required|string|max:255',
                'date_start' => 'required|date',
                'date_finish' => 'required|date',
                'quota' => 'required|numeric',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], $message);
    
            if($validate->fails()){
                $this->data['message'] = 'error';
                $this->data['error'] = $validate->errors();
                return $this->data;
            }
            
            $event = Event::find($id);
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $uuid4 = Uuid::uuid4();
                $name = $uuid4->toString().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/img/event');
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
            return response()->json([
                'message' => 'Success Edit',
                'data' => $event
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to Edit',
                'data' => null
            ], 400);
        }
       
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
            $users = Event::find($id);
            $users -> delete();
            return response()->json([
                'message' => 'Success Delete',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed Delete',
            ], 400);
        }
       
    }
}
