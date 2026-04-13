<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tasca;
use Illuminate\Http\Request;

class TascaController extends Controller
{
    public function index()
    {
        $tasques = Tasca::with('categoria')->latest()->get();

        return view('tasques.index', compact('tasques'));
    }

    public function create()
    {
        $categories = Categoria::orderBy('name')->get();

        return view('tasques.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable|boolean',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        $validated['completed'] = $request->has('completed');

        Tasca::create($validated);

        return redirect()->route('tasques.index')
            ->with('success', 'Tasca creada correctament.');
    }

    public function show(Tasca $tasca)
    {
    }

    public function edit(Tasca $tasca)
    {
        $categories = Categoria::orderBy('name')->get();

        return view('tasques.edit', compact('tasca', 'categories'));
    }

    public function update(Request $request, Tasca $tasca)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable|boolean',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        $validated['completed'] = $request->has('completed');

        $tasca->update($validated);

        return redirect()->route('tasques.index')
            ->with('success', 'Tasca actualitzada correctament.');
    }

    public function destroy(Tasca $tasca)
    {
        $tasca->delete();

        return redirect()->route('tasques.index')
            ->with('success', 'Tasca eliminada correctament.');
    }
}