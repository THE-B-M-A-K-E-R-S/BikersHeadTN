<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\ReclamationType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index(): View|Factory|Application
    {
        $reclamations = Reclamation::query()
            ->where('description', 'LIKE', "%%")
            ->paginate(2);
        return view('layouts.reclamation.index', compact('reclamations'));
    }

    public function create(): View|Factory|Application
    {
        $reclamationTypes = ReclamationType::all();
        return view('layouts.reclamation.create', compact('reclamationTypes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'date' => 'required',
            'satisfaction_level' => 'required',
        ]);

        $reclamation = Reclamation::create($request->all());

        return redirect()->route('reclamation.index')
            ->with('success', 'Reclamation reclamée.');
    }

    public function show($id): Factory|View|Application
    {
        $reclamation = Reclamation::find($id);
        return view('layouts.reclamation.show', compact('reclamation'));
    }

    public function edit($id): Factory|View|Application
    {
        $reclamation = Reclamation::find($id);
        $reclamationTypes = ReclamationType::all();
        return view('layouts.reclamation.edit', compact('reclamation', 'reclamationTypes'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $reclamation = Reclamation::find($id);
        $input = $request->all();

        $reclamation->update($input);
        return redirect()->route('reclamation.index')
            ->with('success', 'Reclamation updated successfully');

    }

    public function destroy($id): RedirectResponse
    {
        $reclamation = Reclamation::find($id);
        $reclamation->delete();
        return redirect()->route('reclamation.index')
            ->with('success', 'Reclamation deleted successfully');
    }

    public function reclamation_search(Request $request): Factory|View|Application
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $reclamations = Reclamation::query()
            ->where('description', 'LIKE', "%{$search}%")
            ->get();

        return view('layouts.reclamation.index', compact('reclamations'));
    }

    public function reclamation_tri(Request $request): Factory|View|Application
    {
        // Get the search value from the request
        $tri = $request->input('tri');

        if ($tri == 'ALL') {
            $reclamations = Reclamation::all();
        }
        else if ($tri == 'DESCRIPTION') {
            $reclamations = Reclamation::orderBy('description', 'ASC')->get();
        }
        else $reclamations = Reclamation::orderBy('date', 'ASC')->get();



        return view('layouts.reclamation.index', compact('reclamations'));
    }
}
