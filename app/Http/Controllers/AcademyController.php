<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    // GET /api/academies -> Cualquier usuario autenticado puede ver todas
    public function index()
    {
        $academies = Academy::with('user:id,name,email')->get();

        return response()->json([
            'data' => $academies
        ], 200);
    }

    // POST /api/academies -> Crea una academia vinculada automáticamente al usuario del token
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:academies,email',
        ]);

        // Asigna automáticamente el user_id del usuario autenticado
        $academy = $request->user()->academies()->create($validated);

        return response()->json([
            'message' => 'Academia creada correctamente',
            'data' => $academy
        ], 201);
    }

    // GET /api/academies/{academy} -> Cualquier usuario autenticado puede ver el detalle
    public function show(Academy $academy)
    {
        return response()->json([
            'data' => $academy->load('user:id,name,email', 'courses')
        ], 200);
    }

    // PUT/PATCH /api/academies/{academy} -> Solo el creador puede modificarla
    public function update(Request $request, Academy $academy)
    {
        // Autorización: comprobar si el usuario logueado es el dueño
        if ($request->user()->id !== $academy->user_id) {
            return response()->json([
                'message' => 'No tienes permiso para modificar esta academia.'
            ], 403);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'sometimes|required|email|unique:academies,email,' . $academy->id,
        ]);

        $academy->update($validated);

        return response()->json([
            'message' => 'Academia actualizada correctamente',
            'data' => $academy
        ], 200);
    }

    // DELETE /api/academies/{academy} -> Solo el creador puede eliminarla
    public function destroy(Request $request, Academy $academy)
    {
        // Autorización: comprobar si el usuario logueado es el dueño
        if ($request->user()->id !== $academy->user_id) {
            return response()->json([
                'message' => 'No tienes permiso para eliminar esta academia.'
            ], 403);
        }

        $academy->delete();

        return response()->json([
            'message' => 'Academia eliminada correctamente'
        ], 200);
    }
}