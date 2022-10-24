<?php

namespace App\Http\Controllers;

use App\Models\AssociationType;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssociationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // get all baladeTypes
        $associationTypes = AssociationType::all();
        // return view with events
        return view('layouts.associationtype.index', compact('associationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('layouts.tssociationtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);



        $associationType = associationType::create($request->all());



        return redirect()->route('associationtype.index')
            ->with('success', 'AssociationType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $associationType = AssociationType::find($id);
        return view('layouts.associationtype.show', compact('associationType'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $associationType = AssociationType::find($id);
        return view('layouts.associationtype.edit', compact('associationType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $associationType = AssociationType::find($id);
        $input = $request->all();

        $associationType->update($input);
        return redirect()->route('associationtype.index')
            ->with('success', 'AssociationType updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $associationType = AssociationType::find($id);
        $associationType->delete();
        return redirect()->route('Associationtype.index')
            ->with('success', 'BaladeType deleted successfully');
    }
}

