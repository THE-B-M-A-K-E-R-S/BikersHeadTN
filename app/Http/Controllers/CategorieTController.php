<?php

namespace App\Http\Controllers;
use App\Models\CategorieT;
use Illuminate\Http\Request;

class CategorieTController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categoriets = CategorieT::orderBy('id','desc')->paginate(5);
        return view('layouts.categoriets.index', compact('categoriets'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('layouts.categoriets.create');
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
            'type' => 'required',
        ]);
        
        CategorieT::create($request->post());

        return redirect()->route('categoriets.index')->with('success','CategorieTrotinette has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\categoriet $categoriet
    * @return \Illuminate\Http\Response
    */
    public function show(CategorieT $categoriet)
    {
        return view('layouts.categoriets.show',compact('categoriet'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\CategorieT  $categoriet
    * @return \Illuminate\Http\Response
    */
    public function edit(CategorieT $categoriet)
    {
        return view('layouts.categoriets.edit',compact('categoriet'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\CategorieT  $categoriet
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, CategorieT $categoriet)
    {
        $request->validate([
            'type' => 'required',
        ]);
        
        $categoriet->fill($request->post())->save();

        return redirect()->route('categoriets.index')->with('success','CategorieT Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\CategorieT  $categoriet
    * @return \Illuminate\Http\Response
    */
    public function destroy(CategorieT $categoriet)
    {
        $categoriet->delete();
        return redirect()->route('categoriets.index')->with('success','CategorieTrotinette has been deleted successfully');
    }
}
