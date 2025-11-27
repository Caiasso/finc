@extends('layout')

@section('title', 'Configurações - FINC')

@section('header')
<nav class="flex space-x-4">
    <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-300 transition-colors">Voltar</a>
</nav>
@endsection

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 space-y-6">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-retro text-white mb-4">Configurações</h2>
        <p class="text-white opacity-90">Gerencie suas preferências e conta</p>
    </div>

    <!-- Settings Options -->
    <div class="space-y-4">
        <!-- Edit Account -->
        <div class="card-pastel">
            <a href="#" class="flex items-center justify-between p-4 hover:bg-opacity-80 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 p-3 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-retro text-lg text-gray-800">Editar Conta</h3>
                        <p class="text-gray-600">Atualize suas informações pessoais</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Notifications -->
        <div class="card-pastel">
            <a href="#" class="flex items-center justify-between p-4 hover:bg-opacity-80 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="bg-yellow-500 p-3 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-retro text-lg text-gray-800">Notificações</h3>
                        <p class="text-gray-600">Gerencie alertas e lembretes</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Dark Mode -->
        <div class="card-pastel">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center space-x-4">
                    <div class="bg-purple-500 p-3 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-retro text-lg text-gray-800">Modo Escuro</h3>
                        <p class="text-gray-600">Alterne entre tema claro e escuro</p>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>
            </div>
        </div>

        <!-- FAQ -->
        <div class="card-pastel">
            <a href="#" class="flex items-center justify-between p-4 hover:bg-opacity-80 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="bg-green-500 p-3 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-retro text-lg text-gray-800">FAQ</h3>
                        <p class="text-gray-600">Perguntas frequentes</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Help -->
        <div class="card-pastel">
            <a href="#" class="flex items-center justify-between p-4 hover:bg-opacity-80 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="bg-orange-500 p-3 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-retro text-lg text-gray-800">Ajuda</h3>
                        <p class="text-gray-600">Suporte e contato</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Privacy -->
        <div class="card-pastel">
            <a href="#" class="flex items-center justify-between p-4 hover:bg-opacity-80 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="bg-red-500 p-3 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-retro text-lg text-gray-800">Privacidade</h3>
                        <p class="text-gray-600">Política de privacidade e dados</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Open Source -->
        <div class="card-pastel">
            <a href="#" class="flex items-center justify-between p-4 hover:bg-opacity-80 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="bg-indigo-500 p-3 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 000-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-retro text-lg text-gray-800">Código Aberto</h3>
                        <p class="text-gray-600">Contribua com o projeto no GitHub</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-12">
        <p class="text-white opacity-75">FINC — versão 1.0</p>
        <p class="text-white opacity-50 text-sm mt-2">Feito com amor | Free & Open Source</p>
    </div>
</div>
@endsection
