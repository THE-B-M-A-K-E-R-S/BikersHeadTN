<?php

namespace App\Http\Controllers;
use App\Models\Trotinette;
use App\Models\CategorieT;
use Illuminate\Http\Request;

class TrotinetteController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {

      
        $trotinettes = Trotinette::orderBy('id','desc')->paginate(5);
        // $trotinettes = Trotinette::with('categorieT')->get();
        return view('layouts.trotinettes.index', compact('trotinettes'));

        // $trotinettes = Trotinette::with('CategorieTrotinette')->get();
        // return view('trotinettes.index', compact('trotinettes'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // $CategorieTrotinettes= CategorieT::all();
       
        $categoriets = CategorieT::all();
        return view('layouts.trotinettes.create',['categoriets' => $categoriets]);
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
            'nom' => 'required',
            'categorie' => 'required',
            'vitesse' => 'required',
            'poids' => 'required',
            'couleur' => 'required',
            'prix' => 'required',
            'prix_location' => 'required',
        ]);
        
        Trotinette::create($request->post());

        return redirect()->route('trotinettes.index')->with('success','Trotinette has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\trotinette $trotinette
    * @return \Illuminate\Http\Response
    */
    public function show(Trotinette $trotinette)
    {
        return view('layouts.trotinettes.show',compact('trotinette'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Trotinette  $trotinette
    * @return \Illuminate\Http\Response
    */
    public function edit(Trotinette $trotinette)
    {
        return view('layouts.trotinettes.edit',compact('trotinette'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\trotinette  $trotinette
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Trotinette $trotinette)
    {
        $request->validate([
            'nom' => 'required',
            'categorie' => 'required',
            'vitesse' => 'required',
            'poids' => 'required',
            'couleur' => 'required',
            'prix' => 'required',
            'prix_location' => 'required',
            'quantite' => 'required',
        ]);
        
        $trotinette->fill($request->post())->save();

        return redirect()->route('trotinettes.index')->with('success','Trotinette Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Trotinette  $trotinette
    * @return \Illuminate\Http\Response
    */
    public function destroy(Trotinette $trotinette)
    {
        $trotinette->delete();
        return redirect()->route('trotinettes.index')->with('success','Trotinette has been deleted successfully');
    }
    
}
