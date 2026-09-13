<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // 1. Listar todas as categorias
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // 2. Exibir formulário de criação
    public function create()
    {
        return view('categorias.create');
    }

    // 3. Salvar nova categoria no banco
    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->validated());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria criada com sucesso!');
    }

    // 4. Mostrar detalhes de uma categoria específica (opcional)
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    // 5. Exibir formulário de edição
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // 6. Atualizar a categoria no banco
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,' . $categoria->id,
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    // 7. Excluir a categoria
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria excluída com sucesso!');
    }
}