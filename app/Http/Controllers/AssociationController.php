<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        if (!empty($filter)) {
            $associations = Association::sortable()
                ->where('name', 'like', '%'.$filter.'%')
                ->paginate(3);
        } else {
            $associations = Association::sortable()->paginate(3);

        }
        // return view with associations
        return view('layouts.association.index', compact('associations','filter'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('layouts.association.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'pres_name' => 'required',
            'description' => 'required',
            'association_types_id' => 'required'
        ]);



        $association = Association::create($request->all());


        return redirect()->route('association.index')
            ->with('success', 'association created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $association = Association::find($id);
        return view('layouts.association.show', compact('association'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $association = Association::find($id);
        return view('layouts.association.edit', compact('association'));
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
        $association = Association::find($id);
        $input = $request->all();

        $association->update($input);
        return redirect()->route('association.index')
            ->with('success', 'association updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $association = Association::find($id);
        $association->delete();
        return redirect()->route('association.index')
            ->with('success', 'association deleted successfully');
    }
}
