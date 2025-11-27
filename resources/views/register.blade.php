@extends('layout')

@section('title', 'Criar Conta - FINC')

@section('header')
<nav class="flex space-x-4">
    <a href="{{ route('landing') }}" class="text-white hover:text-yellow-300 transition-colors">Voltar</a>
</nav>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full">
        <div class="card">
            <h2 class="text-3xl font-retro text-center mb-8 text-gray-800">Criar Conta</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="form-label">Nome</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="form-input">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-input">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" type="password" name="password" required class="form-input">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required class="form-input">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="btn-groovy w-full">
                        Criar Conta
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Já tem conta?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">Entrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
