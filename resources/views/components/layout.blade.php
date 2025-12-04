<!DOCTYPE html>
<html lang="pt-BR" x-data="temaApp()" x-init="carregarTema()" :data-theme="tema">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Finc' : 'Finc' }}</title>

    <script src="//unpkg.com/alpinejs" defer></script>

    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos do Ticker -->
    <style>
        .ticker-container {
            position: relative;
            overflow: hidden;
            height: 34px;
            mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
            padding-inline: 1.25rem;
            /* aumenta espaço visível nas laterais */
            box-sizing: border-box;
        }

        /* Track: duas cópias lado a lado no HTML (já presente). --shift será definido dinamicamente em px */
        .ticker-track {
            display: flex;
            align-items: center;
            gap: 0;
            /* gaps entre itens controlados no .ticker-block */
            will-change: transform;
            --shift: 0px;
            --duration: 12s;
            animation: tickerLoop var(--duration) linear infinite;
        }

        /* Cada bloco agrupa os itens; largura é automática (medida pelo JS) */
        .ticker-block {
            display: flex;
            gap: 3rem;
            white-space: nowrap;
            flex: 0 0 auto;
            align-items: center;
            padding-right: 3rem;
            /* espaço extra no final do bloco para criar gap entre cópias */
            box-sizing: border-box;
        }

        @keyframes tickerLoop {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(calc(var(--shift) * -1));
                /* usa px exato para evitar pulo */
            }
        }
    </style>

    <!-- Estilos da animação de tema -->
    <style>
        .tema-icon {
            transition: transform 0.4s ease, opacity 0.3s ease;
        }

        .tema-icon-enter {
            transform: translateY(10px);
            opacity: 0;
        }

        .tema-icon-show {
            transform: translateY(0px);
            opacity: 1;
        }

        .tema-icon-exit {
            transform: translateY(-10px);
            opacity: 0;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">

    <nav class="navbar bg-base-100">
        <!-- ESQUERDA -->
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">🪙 Finc</a>
        </div>

        <!-- CENTRO — Ticker -->
        @auth
            @if ($movimentacoesMesTicker->count() >= 2)
                <div class="navbar-center w-full max-w-2xl gap-4">
                    <div class="ticker-container">
                        <div class="ticker-track">
                            <div class="ticker-block" aria-hidden="false">
                                {{-- BLOCO 1 --}}
                                @foreach ($movimentacoesMesTicker as $movimentacao)
                                    <div class="flex items-center gap-2 text-sm">
                                        <span class="text-base-content/70">
                                            {{ $movimentacao->descricao }}
                                        </span>

                                        @php
                                            $isEntrada = $movimentacao->tipo_movimentacao == 1;
                                            $cor = $isEntrada ? 'text-success' : 'text-error';
                                        @endphp

                                        <span class="{{ $cor }} font-semibold">
                                            R$
                                            {{ number_format($movimentacao->valor_movimentacao, 2, ',', '.') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="ticker-block" aria-hidden="true">
                                {{-- BLOCO 2 (duplicado para loop perfeito) --}}
                                @foreach ($movimentacoesMesTicker as $movimentacao)
                                    <div class="flex items-center gap-2 text-sm">
                                        <span class="text-base-content/70">
                                            {{ $movimentacao->descricao }}
                                        </span>

                                        @php
                                            $isEntrada = $movimentacao->tipo_movimentacao == 1;
                                            $cor = $isEntrada ? 'text-success' : 'text-error';
                                        @endphp

                                        <span class="{{ $cor }} font-semibold">
                                            R$
                                            {{ number_format($movimentacao->valor_movimentacao, 2, ',', '.') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="navbar-center"></div>
            @endif
        @endauth

        <!-- DIREITA -->
        <div class="navbar-end gap-4">

            @auth
                <!-- Botão de Tema -->
                <button class="btn btn-ghost btn-sm h-9 w-9 relative flex items-center justify-center p-0 overflow-hidden"
                    @click="alternarTema()" aria-label="Alternar tema">

                    <span class="relative w-5 h-5 block">

                        <!-- Sol -->
                        <svg x-cloak x-show="tema === 'lofi'" x-transition:enter="transform transition duration-350"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transform transition duration-250"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-5 h-5 absolute inset-0 m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v2m0 14v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2m18 0h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42M12 8a4 4 0 100 8 4 4 0 000-8z" />
                        </svg>

                        <!-- Lua -->
                        <svg x-cloak x-show="tema === 'dark'" x-transition:enter="transform transition duration-350"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transform transition duration-250"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-5 h-5 absolute inset-0 m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                        </svg>

                    </span>
                </button>

                <span>·</span>

                <span class="text-sm">{{ auth()->user()->name }}</span>

                <span>·</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-ghost">Sair</button>
                </form>

            @else
                <a href="{{ route('register') }}" class="btn btn-ghost btn-sm">Criar conta</a>
                <a href="/login" class="btn btn-primary btn-sm">Entrar</a>
            @endauth
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            @php
                $hojeExtenso = now()->locale('pt_BR')->translatedFormat('l, d \d\e F \d\e Y');
            @endphp
            <div class="text-base-content/70 text-sm">{{ $hojeExtenso }}</div>
            <p>© {{ date('Y') }} Finc - Feito com ❤️ pelo trio parada dura de TEP-3</p>
        </div>
    </footer>

    <!-- Alpine -->
    <script>
        function temaApp() {
            return {
                tema: 'lofi',
                carregarTema() {
                    const salvo = localStorage.getItem('tema');
                    this.tema = salvo ? salvo : 'lofi';
                },
                alternarTema() {
                    this.tema = (this.tema === 'lofi') ? 'dark' : 'lofi';
                    localStorage.setItem('tema', this.tema);
                }
            }
        }
    </script>

    <script>
        // Ajusta dinamicamente o shift (px) e duração com base na largura real do primeiro bloco
        (function ajusteTicker() {
            const tracks = document.querySelectorAll('.ticker-track');
            tracks.forEach(track => {
                const firstBlock = track.querySelector('.ticker-block');
                const secondBlock = firstBlock ? firstBlock.nextElementSibling : null;
                // só prossegue se houver bloco duplicado
                if (!firstBlock || !secondBlock) return;

                // força reflow para garantir medidas corretas
                const width = firstBlock.getBoundingClientRect().width;

                // define o deslocamento em px (move exatamente a largura do primeiro bloco)
                track.style.setProperty('--shift', `${width}px`);

                // define duração baseada em velocidade (px por segundo)
                const pxPerSecond = 80; // ajuste para mais/menos velocidade
                const durationSec = Math.max(6, width / pxPerSecond); // mínimo 6s
                track.style.setProperty('--duration', `${durationSec}s`);
            });

            // recalcula ao redimensionar (debounced)
            let t;
            window.addEventListener('resize', () => {
                clearTimeout(t);
                t = setTimeout(ajusteTicker, 150);
            });
        })();
    </script>
</body>

</html>