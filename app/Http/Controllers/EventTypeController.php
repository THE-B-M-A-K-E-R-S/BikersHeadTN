<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all eventype
        $eventTypes = EventType::all();
        // return view with events
        return view('layouts.eventype.index', compact('eventTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('layouts.EventType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $eventType = EventType::create($request->all());
        return redirect()->route('eventype.index')
            ->with('success', 'EventType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $eventType= EventType::find($id);
        return view('layouts.eventype.show', compact('eventType'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $eventType = EventType::find($id);
        return view('layouts.eventype.edit', compact('eventType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $eventType = EventType::find($id);
        $input = $request->all();

        $eventType->update($input);
        return redirect()->route('eventype.index')
            ->with('success', 'EventType updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventType  $eventType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $eventType = EventType::find($id);
        $eventType->delete();
        return redirect()->route('eventype.index')
            ->with('success', 'EventType deleted successfully');
    }
}
