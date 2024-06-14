<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ]);

        $produto = Produto::create($validatedData);

        return response()->json($produto, 201);
    }

    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json($produto);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($validatedData);

        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return response()->json(null, 204);
    }
}
