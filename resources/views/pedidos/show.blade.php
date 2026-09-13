<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalhes do Pedido #{{ $pedido->id }}</h2>
            <a href="{{ route('pedidos.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md text-sm">Voltar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <span class="text-sm font-medium text-gray-500">Status: </span>
                    <span class="font-bold text-gray-800">{{ ucfirst($pedido->status) }}</span>
                </div>

                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Item</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Qtd</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Preço Unit.</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($pedido->itens as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->pizza->nome ?? 'Pizza removida' }}</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-700">{{ $item->quantidade }}</td>
                                <td class="px-6 py-4 text-sm text-right text-gray-700">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 text-sm text-right font-medium text-gray-900">R$ {{ number_format($item->preco_unitario * $item->quantidade, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50">
                            <td colspan="3" class="px-6 py-4 text-right font-bold text-gray-900">Total:</td>
                            <td class="px-6 py-4 text-right font-bold text-indigo-600">R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>