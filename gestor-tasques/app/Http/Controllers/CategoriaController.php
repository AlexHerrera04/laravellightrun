<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categories = Categoria::withCount('tasques')->orderBy('name')->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categoria::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Categoria creada correctament.');
    }

    public function show(Categoria $category)
    {
    }

    public function edit(Categoria $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Categoria $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Categoria actualitzada correctament.');
    }

    public function destroy(Categoria $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoria eliminada correctament.');
    }
}