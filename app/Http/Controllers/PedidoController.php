<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\ItemPedido;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    // 1. Listar pedidos do usuário autenticado
    public function index()
    {
        $pedidos = Pedido::where('user_id', Auth::id())
            ->with('itens.pizza')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pedidos.index', compact('pedidos'));
    }

    // 2. Formulário/tela de criação de pedido com lista de pizzas
    public function create()
    {
        $pizzas = Pizza::all();
        return view('pedidos.create', compact('pizzas'));
    }

    // 3. Salvar pedido, criar itens e calcular valor total
    public function store(Request $request)
    {
        $request->validate([
            'itens' => 'required|array|min:1',
            'itens.*.pizza_id' => 'required|exists:pizzas,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $totalPedido = 0;

            // Criar pedido zerado associado ao usuário logado
            $pedido = Pedido::create([
                'user_id' => Auth::id(),
                'status' => 'Pendente',
                'valor_total' => 0,
            ]);

            // Cadastrar cada item e calcular o total
            foreach ($request->itens as $item) {
                $pizza = Pizza::findOrFail($item['pizza_id']);
                $subtotal = $pizza->preco * $item['quantidade'];
                $totalPedido += $subtotal;

                ItemPedido::create([
                    'pedido_id' => $pedido->id,
                    'pizza_id' => $pizza->id,
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $pizza->preco,
                ]);
            }

            // Atualizar o valor final no pedido
            $pedido->update(['total' => $totalPedido]);
        });

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido realizado com sucesso!');
    }

    // 4. Detalhes de um pedido específico
    public function show(Pedido $pedido)
    {
        if ($pedido->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        $pedido->load('itens.pizza');
        return view('pedidos.show', compact('pedido'));
    }
}