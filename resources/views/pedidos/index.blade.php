<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Meus Pedidos</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"># Pedido</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($pedidos as $pedido)
                            <tr>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900">#{{ $pedido->id }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span @class([
                                        'px-2 py-1 text-xs rounded-full font-semibold',
                                        'bg-yellow-100 text-yellow-800' => $pedido->status === 'pendente',
                                        'bg-green-100 text-green-800' => $pedido->status === 'entregue',
                                        'bg-blue-100 text-blue-800' => !in_array($pedido->status, ['pendente', 'entregue']),
                                    ])>
                                        {{ ucfirst($pedido->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900">R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <a href="{{ route('pedidos.show', $pedido) }}" class="text-indigo-600 hover:text-indigo-900">Ver Detalhes</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Você ainda não fez nenhum pedido.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>