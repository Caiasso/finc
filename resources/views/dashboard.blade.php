@extends('layout')

@section('title', 'Dashboard - FINC')

@section('header')
<nav class="flex space-x-4">
    <a href="#" class="text-white hover:text-yellow-300 transition-colors">Alertas</a>
    <a href="{{ route('settings') }}" class="text-white hover:text-yellow-300 transition-colors">Configurações</a>
</nav>
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 space-y-8">
    <!-- Greeting -->
    <div class="text-center">
        <h2 class="text-2xl font-modern text-white mb-2">Olá, {{ auth()->user()->name ?? 'Usuário' }}!</h2>
        <p class="text-white opacity-90">Bem-vindo de volta ao seu painel financeiro</p>
    </div>

    <!-- Balance Card -->
    <div class="card-vibrant text-center">
        <h3 class="text-2xl font-retro mb-4">Saldo Atual</h3>
        <p class="text-5xl font-clean font-bold">R$ 2.450,00</p>
    </div>

    <!-- Mini Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="card-pastel">
            <div class="flex items-center space-x-4">
                <div class="bg-green-500 p-3 rounded-full">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-retro text-lg">Entradas</h4>
                    <p class="text-2xl font-clean font-bold text-green-600">R$ 3.200,00</p>
                </div>
            </div>
        </div>

        <div class="card-pastel">
            <div class="flex items-center space-x-4">
                <div class="bg-red-500 p-3 rounded-full">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-retro text-lg">Saídas</h4>
                    <p class="text-2xl font-clean font-bold text-red-600">R$ 750,00</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Buttons -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="#" class="btn-groovy text-center block">
            Nova Entrada
        </a>
        <a href="#" class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 font-groovy text-center block">
            Nova Saída
        </a>
    </div>

    <!-- Categories Chart -->
    <div class="card">
        <h3 class="text-xl font-retro mb-4 text-center">Gastos por Categoria</h3>
        <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center">
            <p class="text-gray-500">Gráfico de categorias aqui</p>
        </div>
    </div>

    <!-- Last Transactions -->
    <div class="card">
        <h3 class="text-xl font-retro mb-6 text-center">Últimas Transações</h3>
        <div class="space-y-4">
            <div class="card-pastel">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-500 p-2 rounded-full">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium">Salário</p>
                            <p class="text-sm text-gray-600">15/10/2023</p>
                        </div>
                    </div>
                    <p class="text-lg font-clean font-bold text-green-600">+R$ 2.500,00</p>
                </div>
            </div>

            <div class="card-pastel">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-500 p-2 rounded-full">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium">Supermercado</p>
                            <p class="text-sm text-gray-600">14/10/2023</p>
                        </div>
                    </div>
                    <p class="text-lg font-clean font-bold text-red-600">-R$ 150,00</p>
                </div>
            </div>

            <div class="card-pastel">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-500 p-2 rounded-full">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium">Transporte</p>
                            <p class="text-sm text-gray-600">13/10/2023</p>
                        </div>
                    </div>
                    <p class="text-lg font-clean font-bold text-red-600">-R$ 50,00</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
