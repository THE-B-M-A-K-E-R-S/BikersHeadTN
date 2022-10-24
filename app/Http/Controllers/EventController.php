<?php

namespace App\Http\Controllers;

use App\Models\BaladeType;
use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all events
        $events = Event::all();
        // return view with events
        return view('layouts.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $eventTypes = EventType::all();
        return view('layouts.event.create',compact('eventTypes'));
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
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
            'event_type_id' => 'required',
        ]);



       $event = Event::create($request->all());

        if ($request->hasFile('image')) {
            $uploadPath = 'storage/events/';

            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $imageFile->move(base_path('/storage/app/public/events'), $filename);
                $fileImagePathName = $uploadPath . $filename;
                $event->images()->create([
                    'event_id' => $event->id,
                    'image' => $fileImagePathName,
                ]);
            }
        }

        return redirect()->route('event.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('layouts.event.show', compact('event'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('layouts.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $input = $request->all();

        $event->update($input);
        return redirect()->route('event.index')
            ->with('success', 'Event updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('event.index')
            ->with('success', 'Event deleted successfully');
    }
}
