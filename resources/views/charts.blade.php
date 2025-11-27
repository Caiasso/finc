@extends('layout')

@section('title', 'Gráficos - FINC')

@section('header')
<nav class="flex space-x-4">
    <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-300 transition-colors">Voltar</a>
</nav>
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 space-y-8">
    <div class="text-center">
        <h2 class="text-3xl font-retro text-white mb-4">Gráficos</h2>
        <p class="text-white opacity-90">Visualize seus dados financeiros de forma clara</p>
    </div>

    <!-- Chart 1: Categories -->
    <div class="card">
        <h3 class="text-2xl font-retro mb-6 text-center text-gray-800">Gastos por Categoria</h3>
        <div class="h-80 bg-gray-100 rounded-lg flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                </svg>
                <p class="text-gray-500">Gráfico de pizza das categorias</p>
                <p class="text-sm text-gray-400 mt-2">Alimentação: 35% | Transporte: 20% | Lazer: 15% | Outros: 30%</p>
            </div>
        </div>
    </div>

    <!-- Chart 2: Income vs Expenses Last 6 Months -->
    <div class="card">
        <h3 class="text-2xl font-retro mb-6 text-center text-gray-800">Entradas vs Saídas (Últimos 6 Meses)</h3>
        <div class="h-80 bg-gray-100 rounded-lg flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L7.586 9H5V5a1 1 0 10-2 0v8a4 4 0 01-4-4V5a1 1 0 011-1z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M17 3a1 1 0 000 2v8a2 2 0 01-2 2h-2.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 000 1.414l3 3a1 1 0 101.414-1.414L12.414 9H15V5a1 1 0 10-2 0v8a4 4 0 004-4V5a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
                <p class="text-gray-500">Gráfico de barras comparativo</p>
                <p class="text-sm text-gray-400 mt-2">Entradas sempre acima das saídas nos últimos meses</p>
            </div>
        </div>
    </div>

    <!-- Chart 3: Balance Evolution -->
    <div class="card">
        <h3 class="text-2xl font-retro mb-6 text-center text-gray-800">Evolução do Saldo</h3>
        <div class="h-80 bg-gray-100 rounded-lg flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                </svg>
                <p class="text-gray-500">Gráfico de linha da evolução</p>
                <p class="text-sm text-gray-400 mt-2">Saldo crescendo consistentemente ao longo do tempo</p>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="card-pastel text-center">
            <h4 class="font-retro text-lg mb-2">Total Entradas</h4>
            <p class="text-2xl font-clean font-bold text-green-600">R$ 15.200,00</p>
            <p class="text-sm text-gray-600">Últimos 6 meses</p>
        </div>

        <div class="card-pastel text-center">
            <h4 class="font-retro text-lg mb-2">Total Saídas</h4>
            <p class="text-2xl font-clean font-bold text-red-600">R$ 12.450,00</p>
            <p class="text-sm text-gray-600">Últimos 6 meses</p>
        </div>

        <div class="card-pastel text-center">
            <h4 class="font-retro text-lg mb-2">Saldo Líquido</h4>
            <p class="text-2xl font-clean font-bold text-blue-600">R$ 2.750,00</p>
            <p class="text-sm text-gray-600">Últimos 6 meses</p>
        </div>
    </div>
</div>
@endsection
