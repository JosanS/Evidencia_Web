<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Cliente;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    // Display a listing of ordenes
    public function index()
    {
        $ordenes = Orden::with('cliente')->orderBy('created_at', 'desc')->get(); // Fetch all ordens
        return view('ordenes.index', compact('ordenes'));
    }

    // Show the form for creating a new orden
    public function create()
    {
        $clientes = Cliente::all(); // Fetch all clients for selection
        return view('ordenes.create', compact('clientes')); // Return view to create a new orden
    }

    // Store a newly created orden
    public function store(Request $request)
    {
        $request->validate([
            'clienteID' => 'required|exists:clientes,clienteID',
            'numeroFactura' => 'required|string|max:50',
            'estadoOrden' => 'required|string|max:50',
            'fechaCreacion' => 'required|date',
            'direccionEntrega' => 'required|string|max:255',
        ]);

        Orden::create($request->all());
        return redirect()->route('ordenes.index')->with('Confirmado', 'Orden Creada');
    }

    // Show the form for editing the specified orden
    public function edit($ordenID)
    {
        $orden = Orden::findOrFail($ordenID);
        $clientes = Cliente::all(); 
        return view('ordenes.edit', compact('orden', 'clientes'));
    }

    // Update the specified orden
    public function update(Request $request, $ordenID)
    {
        $request->validate([
            'clienteID' => 'required|exists:clientes,clienteID',
            'numeroFactura' => 'required|string|max:50',
            'estadoOrden' => 'required|string|max:50',
            'fechaCreacion' => 'required|date',
            'direccionEntrega' => 'required|string|max:255',
            'evidence_photo' => 'nullable|image|max:2048',
        ]);

        $orden = Orden::findOrFail($ordenID);
        $orden->update($request->except('evidence_photo'));

        if ($request->hasFile('evidence_photo')) {
            if ($orden->evidence_photo) {
                Storage::disk('public')->delete($orden->evidence_photo);
            }
            
            // Guarda la nueva foto
            $path = $request->file('evidence_photo')->store('evidence_photos', 'public');
            $orden->evidence_photo = $path;
        }

        $orden->save();

        return redirect()->route('ordenes.index')->with('Confirmado', 'Orden Actualizada');
    }

    // Show the specified orden
    public function show($ordenID)
    {
        $orden = Orden::with('cliente')->findOrFail($ordenID);
        return view('ordenes.show', compact('orden'));
    }

    // Add this method to your OrdenController
    public function search(Request $request)
    {
        $request->validate([
            'invoice' => 'required|string|max:50',
        ]);

        // Search for the orden by invoice number
        $orden = Orden::where('numeroFactura', $request->invoice)->with('cliente')->first();

        if ($orden) {
        $orden->fechaCreacion = \Carbon\Carbon::parse($orden->fechaCreacion)->format('Y-m-d');
    }

        // Return the home view with the orden if found
        return view('home', compact('orden'));
    }


    // Delete the specified orden
    public function destroy($ordenID)
    {
        $orden = Orden::findOrFail($ordenID); // Find the orden by ID
        $orden->delete(); // Logically delete the orden
        return redirect()->route('ordenes.index')->with('Confirmado', 'Orden eliminada.');
    }

    // List archived ordenes
    public function archived()
    {
        $archivedordenes = Orden::onlyTrashed()->get(); // Fetch archived ordenes
        return view('ordenes.archived', compact('archivedordenes'));
    }

    // Restore archived orden
    public function restore($id)
    {
        $orden = Orden::withTrashed()->findOrFail($id); // Find archived orden
        $orden->restore(); // Restore the archived orden
        return redirect()->route('ordenes.archived')->with('Confirmado', 'Orden Recuperada');
    }
}
