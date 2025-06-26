<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    // Insertar un material con su categoría asociada
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unidadMedida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,idCategoria',
        ]);

        $material = Material::create($validated);

        // Devolver el material con su categoría asociada
        return response()->json($material->load('categoria'), 201);
    }

    // Actualizar un material
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $validated = $request->validate([
            'unidadMedida' => 'sometimes|string',
            'descripcion' => 'sometimes|string',
            'ubicacion' => 'sometimes|string',
            'categoria_id' => 'sometimes|exists:categorias,idCategoria',
        ]);

        $material->update($validated);

        // Devolver el material actualizado con su categoría asociada
        return response()->json($material->load('categoria'));
    }

    // Obtener la lista de materiales y sus categorías asociadas
    public function index()
    {
        $materiales = Material::with('categoria')->get();
        return response()->json($materiales);
    }
}