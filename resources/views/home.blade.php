<x-layout>
    <x-slot:title>
        Boas vindas
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Últimas movimentações</h1>

        <div class="flex justify-start mt-4">
            <button class="btn btn-primary btn-sm" onclick="document.getElementById('grafico-modal').showModal()">
                Ver gastos por categoria 📊
            </button>
        </div>

        <div class="grid grid-cols-3 gap-4 mt-4">

            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">
                    <p class="text-sm text-base-content/60">Entrou nos últimos 30 dias</p>
                    <p class="text-2xl font-bold text-success">R$ {{ number_format($entradas30, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">
                    <p class="text-sm text-base-content/60">Gasto nos últimos 30 dias</p>
                    <p class="text-2xl font-bold text-error">R$ {{ number_format($saidas30, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">
                    <p class="text-sm text-base-content/60">Saldo dos últimos 30 dias</p>

                    <p class="text-2xl font-bold 
                @if ($saldo30 >= 0) text-success @else text-error @endif">
                        R$ {{ number_format($saldo30, 2, ',', '.') }}
                    </p>
                </div>
            </div>

        </div>



        <!-- Chirp Form -->
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/movimentacoes">
                    @csrf
                    <div class="form-control w-full pb-2">
                        <input type="number" name="valor_movimentacao"
                            placeholder="Informe o valor da movimentação aqui ^^"
                            class="input input-bordered w-full resize-none" required></input>
                    </div>
                    <div class="form-control w-full pb-2">
                        <input type="string" name="descricao"
                            placeholder="Uma descrição pra deixar as coisas organizadas"
                            class="input input-bordered w-full resize-none"></input>
                    </div>
                    <div class="form-control w-full">
                        <select name="categoria_id" class="select select-bordered w-full bg-base-100 text-base-content"
                            required>

                            <option value="" disabled selected>Selecione a categoria</option>

                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mt-4 flex items-center justify-between gap-2">
                        <a href="/addCategoria" class="btn btn-primary btn-sm">+ Adicionar categoria</a>

                        <div class="flex items-center gap-4">
                            <button type="submit" name="tipo_movimentacao" value="2" class="btn btn-error btn-sm">
                                Saída
                            </button>

                            <button type="submit" name="tipo_movimentacao" value="1" class="btn btn-success btn-sm">
                                Entrada
                            </button>
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


</x-layout>