<x-layout>
    <x-slot:title>
        Boas vindas
    </x-slot:title>

    <div class="max-w-2xl mx-auto">

        @php
            $firstName = auth()->check() ? explode(' ', trim(auth()->user()->name))[0] : 'Usuário';
            $hour = now()->hour;
            $greeting = $hour < 12 ? 'Bom dia' : ($hour < 18 ? 'Boa tarde' : 'Boa noite');
        @endphp

        <h1 class="text-3xl font-bold mt-8">{{ $greeting }}, {{ $firstName }}!</h1>

        <div class="flex gap-4 mt-4 flex-row items-start">

            <!-- Botão que abre o modal -->
            <button class="btn btn-primary btn-sm" onclick="document.getElementById('grafico-modal').showModal()">
                Ver gráfico por categoria 📊
            </button>

            <!-- Retângulo: Saldo total -->
            <div
                class="card bg-base-100 shadow cursor-default pointer-events-none w-fit p-3 flex items-center flex-row gap-2 h-8">
                <p class="text-sm text-base-content/60">Saldo total:</p>
                <span class="@if ($saldoTotal >= 0) text-success @else text-error @endif font-bold ml-1">
                    R$ {{ number_format($saldoTotal, 2, ',', '.') }}
                </span>
            </div>

        </div>

        <div class="grid grid-cols-3 gap-4 mt-4">

            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">
                    <p class="text-sm text-base-content/60">Entrou nesse mês</p>
                    <p class="text-2xl font-bold text-success">R$ {{ number_format($entradasMes, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">
                    <p class="text-sm text-base-content/60">Saiu nesse mês</p>
                    <p class="text-2xl font-bold text-error">R$ {{ number_format($saidasMes, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">
                    <p class="text-sm text-base-content/60">Saldo do mês</p>

                    <p class="text-2xl font-bold 
                @if ($saldoMes >= 0) text-success @else text-error @endif">
                        R$ {{ number_format($saldoMes, 2, ',', '.') }}
                    </p>
                </div>
            </div>

        </div>



        <!-- Form -->
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/movimentacoes">
                    @csrf
                    <div class="form-control w-full pb-2 mb-2">

                        <label for="valor_movimentacao" class="px-3 py-1 -mb-[1px] w-fit rounded-t-xl 
               bg-base-100 
               border border-base-content/20 border-b-0
               text-sm text-base-content/70">
                            Valor
                        </label>

                        <input type="number" name="valor_movimentacao" id="valor_movimentacao"
                            placeholder="Informe o valor da movimentação aqui ^^"
                            class="input input-bordered w-full rounded-t-none" required min="0" step="0.01" />

                    </div>


                    <div class="form-control w-full pb-2 mb-2">

                        <label for="descricao" class="px-3 py-1 -mb-[1px] w-fit rounded-t-xl
               bg-base-100 
               border border-base-content/20 border-b-0
               text-sm text-base-content/70">
                            Descrição
                        </label>

                        <input type="text" name="descricao" id="descricao"
                            placeholder="Uma descrição pra deixar as coisas organizadas"
                            class="input input-bordered w-full rounded-t-none" />
                    </div>

                    <div class="flex flex-row gap-2 w-full items-end pb-4">

                        <!-- Input + label do select -->
                        <div class="flex-1">
                            <label for="categoria_id" class="px-3 py-1 -mb-[1px] w-fit rounded-t-xl 
            bg-base-100 
            border border-base-content/20 border-b-0
            text-sm text-base-content/70">
                                Categoria
                            </label>

                            <select name="categoria_id" id="categoria_id"
                                class="select select-bordered w-full bg-base-100 text-base-content rounded-t-none h-[42px]"
                                required>

                                <option value="" disabled selected>Selecione a categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botão de adicionar categoria alinhado -->
                        <button onclick="document.getElementById('modalAddCategoria').showModal()" type="button"
                            class="btn btn-primary h-[42px] min-h-[42px] px-4">
                            + Adicionar categoria
                        </button>

                    </div>


                    <div class="flex flex-col items-start gap-4">
                        <div class="mt-2 flex items-center justify-between gap-2 flex-1 w-full">

                            <div class="flex items-center gap-4">
                                <button type="submit" name="tipo_movimentacao" value="2" class="btn btn-ghost btn-sm">
                                    Saída
                                </button>

                                <button type="submit" name="tipo_movimentacao" value="1" class="btn btn-ghost btn-sm">
                                    Entrada
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <!-- Feed -->
        <div class="space-y-4 mt-8">
            @forelse ($movimentacoes as $movimentacao)
                <x-movimentacao :movimentacao="$movimentacao" />
            @empty
                <div class="hero py-12">
                    <div class="hero-content text-center">
                        <div>
                            <span class="text-5xl">💸</span>
                            <p class="mt-4 text-base-content/60">Nenhuma movimentação ainda. Vamos começar!</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>





    <!-- Modal do Gráfico -->
    <dialog id="grafico-modal" class="modal">
        <div class="modal-box max-w-3xl bg-base-100 shadow-xl rounded-lg">

            <h3 class="font-bold text-xl mb-4 text-center">Gastos por Categoria</h3>

            <!-- Filtros -->
            <div class="flex justify-center gap-2 mb-4">
                @foreach (['7' => '7 dias', '15' => '15 dias', '30' => '30 dias', '365' => '1 ano', '0' => 'Total'] as $dias => $label)
                    <button class="btn btn-sm filtro-btn" data-dias="{{ $dias }}">{{ $label }}</button>
                @endforeach
            </div>

            <!-- Container do gráfico -->
            <div class="w-full h-[320px] flex items-center justify-center">
                <canvas id="graficoCategorias" class="max-h-[300px]"></canvas>
            </div>

            <div class="modal-action">
                <button class="btn" onclick="document.getElementById('grafico-modal').close()">Fechar</button>
            </div>
        </div>
    </dialog>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const ctx = document.getElementById('graficoCategorias').getContext('2d');
            let grafico = null;

            // Função para carregar o gráfico com dados já enviados do controlador
            function carregarGrafico(dias) {
                fetch("{{ url('/graficos/gastos') }}?dias=" + dias)
                    .then(res => res.json())
                    .then(data => {
                        if (grafico) grafico.destroy();

                        grafico = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    label: 'Gastos (R$)',
                                    data: data.valores,
                                    borderWidth: 1,
                                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: { color: "#666" }
                                    },
                                    x: {
                                        ticks: { color: "#666" }
                                    }
                                },
                                plugins: {
                                    legend: { display: false }
                                }
                            }
                        });
                    });
            }

            // Botões do filtro
            document.querySelectorAll('.filtro-btn').forEach(btn => {
                btn.addEventListener('click', e => {
                    const dias = e.target.dataset.dias;
                    carregarGrafico(dias);
                });
            });

            // Carrega padrão (30 dias)
            carregarGrafico(30);
        });
    </script>



    <!-- Modal Adicionar Categoria -->
    <dialog id="modalAddCategoria" class="modal">
        <div class="modal-box bg-base-100 shadow-xl rounded-lg max-w-md">

            <h3 class="font-bold text-xl mb-4 text-center">Adicionar categoria</h3>

            <form method="POST" action="/addCategoria">
                @csrf

                <div class="form-control w-full">
                    <input type="text" name="nome" class="input input-bordered w-full" placeholder="Nome da categoria"
                        required>
                </div>

                <div class="modal-action flex justify-between w-full">
                    <button type="button" class="btn btn-ghost btn-sm"
                        onclick="document.getElementById('modalAddCategoria').close()">
                        Voltar
                    </button>

                    <button type="submit" class="btn btn-primary btn-sm">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </dialog>



</x-layout>