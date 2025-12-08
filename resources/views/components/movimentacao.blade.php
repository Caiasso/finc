@props(['movimentacao'])

<!-- estilo local para o divisor (funciona em claro e escuro) -->
<style>
    .mov-divider {
        height: 1px;
        margin: 0.75rem 0;
        background: linear-gradient(to right,
                rgba(0, 0, 0, 0),
                rgba(17, 24, 39, 0.06),
                rgba(0, 0, 0, 0));
    }

    /* tema escuro (usa branco suave no centro) */
    html[data-theme="dark"] .mov-divider {
        background: linear-gradient(to right,
                rgba(255, 255, 255, 0),
                rgba(255, 255, 255, 0.06),
                rgba(255, 255, 255, 0));
    }
</style>

<div class="card bg-base-100 shadow border-t-4 
        @if($movimentacao->tipo_movimentacao == 1)
            border-green-500
        @elseif($movimentacao->tipo_movimentacao == 2)
            border-red-500
        @endif">
    <div class="card-body">
        <div class="flex space-x-3">
            <div class="min-w-0 flex-1">

                <div class="flex justify-between w-full mb-2">
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-base-content/60">
                            {{ $movimentacao->created_at->format('d/m/Y') }}
                        </span>
                        <span>·</span>
                        <p class="truncate">{{ $movimentacao->descricao }}</p>
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

                <!-- divisor fino com fade nas pontas -->
                <div class="mov-divider" role="separator" aria-hidden="true"></div>

                <div class="flex flex-col gap-2">

                    <div
                        class="card bg-base-200 shadow cursor-default pointer-events-none w-fit p-3 flex items-center flex-row gap-2 h-8">
                        <p>{{ $movimentacao->categoria->nome }}</p>
                        <span>·</span>
                        <p>R$ {{ number_format($movimentacao->valor_movimentacao, 2, ',', '.') }}</p>
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
                        <div
                            class="card bg-base-200 shadow cursor-default pointer-events-none w-fit p-3 flex items-center flex-row gap-2 h-8">
                            <p class="text-sm text-base-content/60">Gasto nos últimos 30 dias nesta categoria:</p>
                            <p class="text-red-600 font-semibold">
                                R$ {{ number_format($total30dias, 2, ',', '.') }}
                            </p>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>