<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::with('marca')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string',
            'precio'   => 'required|numeric',
            'marca_id' => 'required|exists:marcas,id'
        ]);

        return Producto::create($request->all());
    }

    public function show(Producto $producto)
    {
        return $producto->load('marca');
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre'   => 'required|string',
            'precio'   => 'required|numeric',
            'marca_id' => 'required|exists:marcas,id'
        ]);

        $producto->update($request->all());
        return $producto;
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }
}
