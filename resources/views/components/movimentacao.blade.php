@props(['movimentacao'])

<div class="card bg-base-100 shadow border-t-4 
        @if($movimentacao->tipo_movimentacao == 1)
            border-green-500
        @elseif($movimentacao->tipo_movimentacao == 2)
            border-red-500
        @endif">
    <div class="card-body">
        <div class="flex space-x-3">
            <div class="min-w-0 flex-1">

                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm text-base-content/60">
                            {{ $movimentacao->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <div class="flex gap-1">
                        <a href="/movimentacoes/{{ $movimentacao->id }}/edit" class="btn btn-ghost btn-xs">
                            Editar
                        </a>
                        <form method="POST" action="/movimentacoes/{{ $movimentacao->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Tem certeza que deseja deletar essa movimentação?')"
                                class="btn btn-ghost btn-xs text-error">
                                Deletar
                            </button>
                        </form>
                    </div>
                </div>

                <p class="m-2">{{ $movimentacao->descricao }}</p>

                <div class="m-2 shadow rounded-b-sm bg-gray-100 w-fit p-2 items-center flex flex-row gap-2">
                    <p class="text-black font-bold">Valor:</p>
                    <p>R$ {{ number_format($movimentacao->valor_movimentacao, 2, ',', '.') }}</p>
                </div>

                <div class="m-2 shadow rounded-b-sm bg-gray-100 w-fit p-2 items-center flex flex-row gap-2">
                    <p class="text-black font-bold">Categoria:</p>
                    <p>{{ $movimentacao->categoria->nome }}</p>
                </div>

                @php
                    $total30dias = $movimentacao->categoria
                        ->movimentacoes()
                        ->where('user_id', auth()->id())
                        ->where('tipo_movimentacao', 2)
                        ->where('created_at', '>=', now()->subDays(30))
                        ->sum('valor_movimentacao');
                @endphp

                @if ($movimentacao->tipo_movimentacao == 2)
                    <div class="m-2 shadow rounded-b-sm bg-gray-100 w-fit p-2 items-center flex flex-row gap-2">
                        <p class="text-black font-bold">Gasto nos últimos 30 dias nesta categoria:</p>
                        <p class="text-red-600 font-semibold">
                            R$ {{ number_format($total30dias, 2, ',', '.') }}
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>