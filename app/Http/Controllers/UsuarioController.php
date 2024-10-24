<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Display a listing of usuarios
    public function index()
    {
        $usuarios = Usuario::all(); // Fetch all usuarios
        return view('usuarios.index', compact('usuarios'));
    }

    // Show the form for creating a new usuario
    public function create()
    {
        $departamentos = Departamento::all();
        return view('usuarios.create', compact('departamentos'));
    }

    // Store a newly created usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol_usuario' => 'required|string|max:50',
            // Add validation for other fields as necessary
        ]);

        Usuario::create($request->all()); // Create a new usuario
        return redirect()->route('usuarios.index')->with('Confirmado', 'Usuario creado');
    }

    // Show the form for editing the specified usuario
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $departamentos = Departamento::all();
        return view('usuarios.edit', compact('usuario', 'departamentos'));
    }

    // Update the specified usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol_usuario' => 'required|string|max:50',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return redirect()->route('usuarios.index')->with('Confirmado', 'Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
