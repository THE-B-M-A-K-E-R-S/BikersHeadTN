<?php

namespace App\Http\Controllers;

use App\Models\BikeType;
use Illuminate\Http\Request;

class BikeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikeTypes = BikeType::all();
        return view('layouts.bikeType.index', compact('bikeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.bikeType.create');
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
            'name' => 'required',
        ]);

        BikeType::create($request->all());

        return redirect()->route('bikeType.index')
            ->with('success', 'Bike type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BikeType  $bikeType
     * @return \Illuminate\Http\Response
     */
    public function show(BikeType $bikeType)
    {
        return view('layouts.bikeType.show', compact('bikeType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BikeType  $bikeType
     * @return \Illuminate\Http\Response
     */
    public function edit(BikeType $bikeType)
    {
        return view('layouts.bikeType.edit', compact('bikeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BikeType  $bikeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BikeType $bikeType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $bikeType->update($request->all());

        return redirect()->route('bikeType.index')
            ->with('success', 'Bike type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BikeType  $bikeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BikeType $bikeType)
    {
        $bikeType->delete();

        return redirect()->route('bikeType.index')
            ->with('success', 'Bike type deleted successfully');
    }
}
