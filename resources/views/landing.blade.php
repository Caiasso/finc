@extends('layout')

@section('title', 'Bem-vindo ao FINC')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-4xl w-full text-center">
        <!-- Logo -->
        <h1 class="text-6xl md:text-8xl font-groovy text-white mb-4 animate-pulse-custom">
            FINC
        </h1>

        <!-- Phrase -->
        <p class="text-xl md:text-2xl font-modern text-white mb-8 opacity-90">
            Gerencie suas finanças com estilo retrô e modernidade
        </p>

        <!-- Animated Icons -->
        <div class="flex justify-center space-x-8 mb-12">
            <div class="animate-bounce-custom">
                <svg class="w-16 h-16 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
            <div class="animate-rotate">
                <svg class="w-16 h-16 text-pink-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="animate-pulse-custom">
                <svg class="w-16 h-16 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="{{ route('register') }}" class="btn-groovy inline-block">
                Criar Conta
            </a>
            <a href="{{ route('login') }}" class="btn-modern inline-block">
                Entrar
            </a>
        </div>
    </div>
</div>
@endsection
