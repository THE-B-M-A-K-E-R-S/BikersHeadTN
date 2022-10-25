<?php

namespace App\Http\Controllers;

use App\Models\ReclamationType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReclamationTypeController extends Controller
{
    public function index(): View|Factory|Application
    {
        $reclamationtypes = ReclamationType::all();
        return view('layouts.reclamationtype.index', compact('reclamationtypes'));
    }

    public function create(): View|Factory|Application
    {
        return view('layouts.reclamationtype.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'label' => 'required',
        ]);

        $reclamationtype = ReclamationType::create($request->all());

        return redirect()->route('reclamationtype.index')
            ->with('success', 'Type crée.');
    }

    public function show($id): Factory|View|Application
    {
        $reclamationtype = ReclamationType::find($id);
        return view('layouts.reclamationtype.show', compact('reclamationtype'));
    }

    public function edit($id): Factory|View|Application
    {
        $reclamationType = ReclamationType::find($id);
        return view('layouts.reclamationtype.edit', compact('reclamationType'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $reclamationType = ReclamationType::find($id);
        $input = $request->all();

        $reclamationType->update($input);
        return redirect()->route('reclamationtype.index')
            ->with('success', 'Type updated successfully');

    }

    public function destroy($id): RedirectResponse
    {
        $reclamationType = ReclamationType::find($id);
        $reclamationType->delete();
        return redirect()->route('reclamationtype.index')
            ->with('success', 'Reclamation deleted successfully');
    }
}
