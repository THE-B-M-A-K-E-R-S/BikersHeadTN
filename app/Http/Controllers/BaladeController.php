<?php

namespace App\Http\Controllers;

use App\Models\Balade;
use App\Models\BaladeType;
use Illuminate\Http\Request;

class BaladeController extends Controller
{

    /* s
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all balades
        $balades = Balade::all();
        // return view with balades
        return view('layouts.balade.index')->with('balades', $balades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $baladeTypes = BaladeType::all();
        return view('layouts.balade.create', compact('baladeTypes'));
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
            'description' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'distance' => 'required',
            'place' => 'required',
            'max_participants' => 'required',
            'balade_type_id' => 'required',

        ]);

        $balade = Balade::create($request->all());

        if ($request->hasFile('image')) {
            $uploadPath = 'storage/balades/';

            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $imageFile->move(base_path('/storage/app/public/balades'), $filename);
                $fileImagePathName = $uploadPath . $filename;
                $balade->images()->create([
                    'bike_id' => $balade->id,
                    'image' => $fileImagePathName,
                ]);
            }
        }

        return redirect()->route('balade.index')
            ->with('success', 'Balade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $balade = Balade::find($id);
        return view('layouts.balade.show', compact('balade'));
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
        //
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $balades = Balade::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();

        return view('layouts.balade.index', compact('balades'));
    }

    public function tri(Request $request){
        // Get the search value from the request
        $tri = $request->input('tri');

        if ($tri == 'ALL') {
            $balades = Balade::all();
        }
        else if ($tri == 'NAME') {
            $balades = Balade::orderBy('name', 'ASC')->get();
        }
        else if ($tri == 'DATE'){
            $balades = Balade::orderBy('date', 'ASC')->get();
        }
        else {
            $balades = Balade::query()
                ->where('difficulty', '=', $tri)
                ->get();
        }

        return view('layouts.balade.index', compact('balades'));
    }
}
