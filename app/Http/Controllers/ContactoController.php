<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactos = Contacto::with('entidad')->get();
        return response()->json($contactos, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:191|unique:contactos,nombre',
            'apellido' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:contactos,email',
            'identificacion' => 'required|string|max:191|unique:contactos,identificacion',
            'entidad_id' => 'required|exists:entidades,id',
            'telefono' => 'nullable|string|max:191',
            'cargo' => 'nullable|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'notas' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        $contacto = Contacto::create($validatedData);
        return response()->json($contacto, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contacto = Contacto::with('entidad')->find($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($contacto, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:191|unique:contactos,nombre,' . $id,
            'apellido' => 'sometimes|required|string|max:191',
            'email' => 'sometimes|required|email|max:191|unique:contactos,email,' . $id,
            'identificacion' => 'sometimes|required|string|max:191|unique:contactos,identificacion,' . $id,
            'entidad_id' => 'sometimes|required|exists:entidades,id',
            'telefono' => 'nullable|string|max:191',
            'cargo' => 'nullable|string|max:191',
            'direccion' => 'nullable|string|max:191',
            'notas' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        $contacto->update($validatedData);
        return response()->json($contacto, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $contacto->delete();
        return response()->json(['message' => 'Contacto eliminado correctamente'], Response::HTTP_OK);
    }
}