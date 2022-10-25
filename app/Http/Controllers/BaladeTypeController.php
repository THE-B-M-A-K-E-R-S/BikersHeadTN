<?php

namespace App\Http\Controllers;

use App\Models\BaladeType;
use Illuminate\Http\Request;

class BaladeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all baladeTypes
        $baladeTypes = BaladeType::all();
        // return view with events
        return view('layouts.baladetype.index', compact('baladeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('layouts.BaladeType.create');
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

        $baladeType = BaladeType::create($request->all());
        return redirect()->route('baladetype.index')
            ->with('success', 'BaladeType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baladeType = BaladeType::find($id);
        return view('layouts.baladetype.show', compact('baladeType'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $baladeType = BaladeType::find($id);
        return view('layouts.baladetype.edit', compact('baladeType'));
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
        $baladeType = BaladeType::find($id);
        $input = $request->all();

        $baladeType->update($input);
        return redirect()->route('baladetype.index')
            ->with('success', 'BaladeType updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $baladeType = BaladeType::find($id);
        $baladeType->delete();
        return redirect()->route('baladetype.index')
            ->with('success', 'BaladeType deleted successfully');
    }
}
