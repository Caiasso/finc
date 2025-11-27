@extends('layout')

@section('title', 'Entrar - FINC')

@section('header')
<nav class="flex space-x-4">
    <a href="{{ route('landing') }}" class="text-white hover:text-yellow-300 transition-colors">Voltar</a>
</nav>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full">
        <div class="card">
            <h2 class="text-3xl font-retro text-center mb-8 text-gray-800">Entrar</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-input">
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

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Lembrar-me</label>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="btn-groovy w-full">
                        Entrar
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center space-y-2">
                <p class="text-gray-600">
                    <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 font-medium">Esqueceu a senha?</a>
                </p>
                <p class="text-gray-600">
                    Não tem conta?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">Criar conta</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
