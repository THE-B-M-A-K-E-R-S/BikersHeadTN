<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index(): View|Factory|Application
    {
        $reclamations = Reclamation::all();
        return view('layouts.reclamation.index', compact('reclamations'));
    }

    public function create(): View|Factory|Application
    {
        return view('layouts.event.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'date' => 'required',
            'satisfaction level' => 'required',
        ]);

        $reclamation = Reclamation::create($request->all());

        return redirect()->route('reclamations.index')
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
        return view('layouts.reclamation.edit', compact('reclamation'));
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
}
