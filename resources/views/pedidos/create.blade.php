<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cardápio</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf
                @forelse ($pizzas->groupBy(fn ($pizza) => $pizza->categoria->nome ?? 'Outros') as $categoriaNome => $pizzasDaCategoria)
                    <div class="mb-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">{{ $categoriaNome }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($pizzasDaCategoria as $pizza)
                                <div x-data="{ selecionado: false }" class="border rounded-lg p-4 flex flex-col justify-between" :class="{ 'border-indigo-500 bg-indigo-50': selecionado }">
                                    <div>
                                        <div class="flex items-start justify-between">
                                            <h4 class="font-bold text-gray-800">{{ $pizza->nome }}</h4>
                                            <span class="text-sm font-semibold text-green-600">R$ {{ number_format($pizza->preco, 2, ',', '.') }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-1">{{ $pizza->descricao }}</p>
                                    </div>

                                    <div class="mt-4 pt-3 border-t flex items-center justify-between">
                                        <label class="inline-flex items-center text-sm font-medium text-gray-700">
                                            <input type="checkbox" x-model="selecionado" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                            <span class="ml-2">Quero esta</span>
                                        </label>

                                        <div class="flex items-center space-x-2">
                                            <input type="hidden" name="itens[{{ $pizza->id }}][pizza_id]" value="{{ $pizza->id }}" :disabled="!selecionado">
                                            <label class="text-xs text-gray-500">Qtd:</label>
                                            <input type="number" name="itens[{{ $pizza->id }}][quantidade]" value="1" min="1" :disabled="!selecionado" class="w-16 rounded-md border-gray-300 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center text-gray-500">
                        Nenhuma pizza cadastrada no cardápio.
                    </div>
                @endforelse

                @if ($pizzas->isNotEmpty())
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg shadow hover:bg-green-700">
                            Fazer Pedido
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-app-layout>