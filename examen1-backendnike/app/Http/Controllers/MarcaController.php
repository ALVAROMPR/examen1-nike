<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        return Marca::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string'
        ]);

        return Marca::create($request->all());
    }

    public function show(Marca $marca)
    {
        return $marca;
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required|string'
        ]);

        $marca->update($request->all());
        return $marca;
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();
        return response()->json(['message' => 'Marca eliminada']);
    }
}