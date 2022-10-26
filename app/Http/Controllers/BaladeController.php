<?php

namespace App\Http\Controllers;

use App\Models\Balade;
use App\Models\BaladeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $balades = Balade::query()
            ->where('name', 'LIKE', "%%")
            ->paginate(1);
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
            'name' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:3|max:100',
            'date' => 'required',
            'duration' => 'required|numeric',
            'distance' => 'required|numeric',
            'place' => 'required',
            'max_participants' => 'required|numeric',
            'balade_type_id' => 'required',

        ]);

        $balade = Balade::create($request->all());

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/balade/';

            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $imageFile->move('uploads/balade/', $filename);
                $fileImagePathName = $filename;
                $balade->images()->create([
                    'balade_id' => $balade->id,
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
        $balade = Balade::find($id);
        return view('layouts.balade.edit', compact('balade'));
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
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'distance' => 'required',
            'place' => 'required',
            'max_participants' => 'required',
        ]);

        $balade = Balade::find($id);
        $input = $request->all();

        $balade->update($input);
        return redirect()->route('balade.index')
            ->with('success', 'Balade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $balade = Balade::find($id);
        $balade->delete();
        return redirect()->route('balade.index')
            ->with('success', '$balade deleted successfully');
    }

    public function balade_search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $balades = Balade::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(2);

        return view('layouts.balade.index', compact('balades'));
    }

    public function balade_tri(Request $request){
        // Get the search value from the request
        $tri = $request->input('tri');

        if ($tri == 'ALL') {
            $balades = Balade::query()
                ->where('name', 'LIKE', "%%")
                ->paginate(1);
        }
        else if ($tri == 'NAME') {
            $balades = Balade::orderBy('name', 'ASC')->paginate(2);
        }
        else if ($tri == 'DATE'){
            $balades = Balade::orderBy('date', 'ASC')->paginate(2);
        }
        else {
            $balades = Balade::query()
                ->where('difficulty', '=', $tri)
                ->paginate(2);
        }

        return view('layouts.balade.index', compact('balades'));
    }
}
