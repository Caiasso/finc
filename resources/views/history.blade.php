@extends('layout')

@section('title', 'Histórico - FINC')

@section('header')
<nav class="flex space-x-4">
    <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-300 transition-colors">Voltar</a>
    <a href="#" class="btn-groovy text-sm px-4 py-2">Adicionar</a>
</nav>
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 space-y-8">
    <div class="text-center">
        <h2 class="text-3xl font-retro text-white mb-4">Histórico</h2>
        <p class="text-white opacity-90">Veja todas as suas transações</p>
    </div>

    <!-- Tabs -->
    <div class="card">
        <div class="flex justify-center mb-6">
            <div class="flex space-x-2 bg-gray-100 rounded-full p-1">
                <button class="px-6 py-2 rounded-full font-medium bg-white shadow-sm text-gray-800">Geral</button>
                <button class="px-6 py-2 rounded-full font-medium text-gray-600 hover:text-gray-800">Entradas</button>
                <button class="px-6 py-2 rounded-full font-medium text-gray-600 hover:text-gray-800">Saídas</button>
            </div>
        </div>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label for="search" class="form-label">Buscar</label>
                <input id="search" type="text" placeholder="Nome da transação..." class="form-input">
            </div>
            <div>
                <label for="start_date" class="form-label">Data Inicial</label>
                <input id="start_date" type="date" class="form-input">
            </div>
            <div>
                <label for="end_date" class="form-label">Data Final</label>
                <input id="end_date" type="date" class="form-input">
            </div>
        </div>

        <!-- Transactions List -->
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
                            <p class="text-sm text-gray-600">Categoria: Trabalho | 15/10/2023</p>
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
                            <p class="font-medium">Supermercado Extra</p>
                            <p class="text-sm text-gray-600">Categoria: Alimentação | 14/10/2023</p>
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
                            <p class="font-medium">Ônibus</p>
                            <p class="text-sm text-gray-600">Categoria: Transporte | 13/10/2023</p>
                        </div>
                    </div>
                    <p class="text-lg font-clean font-bold text-red-600">-R$ 50,00</p>
                </div>
            </div>

            <div class="card-pastel">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-500 p-2 rounded-full">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium">Freelance Design</p>
                            <p class="text-sm text-gray-600">Categoria: Trabalho | 12/10/2023</p>
                        </div>
                    </div>
                    <p class="text-lg font-clean font-bold text-green-600">+R$ 800,00</p>
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
                            <p class="font-medium">Cinema</p>
                            <p class="text-sm text-gray-600">Categoria: Lazer | 11/10/2023</p>
                        </div>
                    </div>
                    <p class="text-lg font-clean font-bold text-red-600">-R$ 60,00</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
