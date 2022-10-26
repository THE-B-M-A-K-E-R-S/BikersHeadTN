<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Bike;
use App\Models\Image;

use App\Models\BikeType;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::all();
        $images = Image::all();
        return view('layouts.bike.index', compact('bikes', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bikeTypes = BikeType::all();
        return view('layouts.bike.create', compact('bikeTypes'));
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
            'color' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'bike_type_id' => 'required',
            'size' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);


        $this -> validate($request, [
        'g-recaptcha-response' =>
        ['required', new Recaptcha()]]);
        
        $bike = Bike::create($request->all());

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/bikes/';

            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $imageFile->move('uploads/bike/', $filename);
                $fileImagePathName = $filename;
                $bike->images()->create([
                    'bike_id' => $bike->id,
                    'image' => $fileImagePathName,
                ]);
            }
        }


        return redirect()->route('bike.index')
            ->with('success', 'Bike created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bike = Bike::find($id);
        return view('layouts.bike.show', compact('bike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bike = Bike::find($id);
        return view('layouts.bike.edit', compact('bike'));
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
        $bike = Bike::find($id);
        $input = $request->all();

        $bike->update($input);
        return redirect()->route('bike.index')
            ->with('success', 'Bike updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bike = Bike::find($id);
        $bike->delete();
        return redirect()->route('bike.index')
            ->with('success', 'Bike deleted successfully');
    }
}
