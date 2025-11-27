@extends('layout')

@section('title', 'Rachadinha - FINC')

@section('header')
<nav class="flex space-x-4">
    <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-300 transition-colors">Voltar</a>
</nav>
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 space-y-8">
    <div class="text-center">
        <h2 class="text-3xl font-retro text-white mb-4">Rachadinha</h2>
        <p class="text-white opacity-90">Divida contas facilmente com seus amigos</p>
    </div>

    <!-- Create Event Form -->
    <div class="card">
        <h3 class="text-xl font-retro mb-6 text-center text-gray-800">Criar Novo Evento</h3>
        <form class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="event_name" class="form-label">Nome do Evento</label>
                    <input id="event_name" type="text" placeholder="Ex: Jantar no restaurante" class="form-input">
                </div>
                <div>
                    <label for="total_amount" class="form-label">Valor Total</label>
                    <input id="total_amount" type="number" step="0.01" placeholder="R$ 0,00" class="form-input">
                </div>
            </div>
            <div>
                <label for="participants" class="form-label">Participantes</label>
                <textarea id="participants" rows="3" placeholder="João, Maria, Pedro (um por linha)" class="form-input"></textarea>
            </div>
            <div class="pt-4">
                <button type="submit" class="btn-groovy w-full md:w-auto">
                    Criar Evento
                </button>
            </div>
        </form>
    </div>

    <!-- Active Events -->
    <div class="space-y-6">
        <h3 class="text-2xl font-retro text-white text-center">Eventos Ativos</h3>

        <div class="card-pastel">
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-retro text-lg text-gray-800">Jantar no Restaurante</h4>
                <span class="text-lg font-clean font-bold text-blue-600">Total: R$ 300,00</span>
            </div>
            <div class="space-y-2">
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="font-medium">João</span>
                    <span class="font-clean font-bold text-green-600">R$ 100,00</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="font-medium">Maria</span>
                    <span class="font-clean font-bold text-green-600">R$ 100,00</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="font-medium">Pedro</span>
                    <span class="font-clean font-bold text-green-600">R$ 100,00</span>
                </div>
            </div>
        </div>

        <div class="card-pastel">
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-retro text-lg text-gray-800">Viagem de Fim de Semana</h4>
                <span class="text-lg font-clean font-bold text-blue-600">Total: R$ 600,00</span>
            </div>
            <div class="space-y-2">
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="font-medium">Ana</span>
                    <span class="font-clean font-bold text-green-600">R$ 150,00</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="font-medium">Carlos</span>
                    <span class="font-clean font-bold text-green-600">R$ 150,00</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="font-medium">Beatriz</span>
                    <span class="font-clean font-bold text-green-600">R$ 150,00</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="font-medium">Daniel</span>
                    <span class="font-clean font-bold text-green-600">R$ 150,00</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
