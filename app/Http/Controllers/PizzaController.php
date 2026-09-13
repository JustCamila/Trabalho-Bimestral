<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Categoria;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;

class PizzaController extends Controller
{
    // 1. Listar todas as pizzas com a categoria associada
    public function index()
    {
        $pizzas = Pizza::with('categoria')->get();
        return view('pizzas.index', compact('pizzas'));
    }

    // 2. Exibir formulário de cadastro (com as categorias para seleção)
    public function create()
    {
        $categorias = Categoria::all();
        return view('pizzas.create', compact('categorias'));
    }

    // 3. Salvar uma nova pizza no banco de dados
    public function store(StorePizzaRequest $request)
    {
        Pizza::create($request->validated());

        return redirect()->route('pizzas.index')
            ->with('success', 'Pizza cadastrada com sucesso!');
    }

    // 4. Mostrar detalhes de uma pizza específica
    public function show(Pizza $pizza)
    {
        return view('pizzas.show', compact('pizza'));
    }

    // 5. Exibir formulário de edição preenchido
    public function edit(Pizza $pizza)
    {
        $categorias = Categoria::all();
        return view('pizzas.edit', compact('pizza', 'categorias'));
    }

    // 6. Atualizar os dados da pizza no banco
    public function update(UpdatePizzaRequest $request, Pizza $pizza)
    {
        $pizza->update($request->validated());

        return redirect()->route('pizzas.index')
            ->with('success', 'Pizza atualizada com sucesso!');
    }

    // 7. Remover uma pizza
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();

        return redirect()->route('pizzas.index')
            ->with('success', 'Pizza excluída com sucesso!');
    }
}