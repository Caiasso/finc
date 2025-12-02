<x-layout>
    <x-slot:title>
        Entrar 📈
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Entrar</h1>

                    <form method="POST" action="/login">
                        @csrf

                        <!-- Email -->
                        <label class="floating-label mb-6">
                            <input type="email" name="email" placeholder="marquinhos.silva@email.com.br"
                                value="{{ old('email') }}"
                                class="input input-bordered @error('email') input-error @enderror" required>
                            <span>Email</span>
                        </label>


                        <!-- Password -->
                        <label class="floating-label mb-6">
                            <input type="password" name="password" placeholder="••••••••"
                                class="input input-bordered @error('password') input-error @enderror" required>
                            <span>Senha</span>
                        </label>

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-sm w-full">
                                Entrar
                            </button>
                        </div>
                    </form>

                    <div class="divider"></div>
                    <p class="text-center text-sm">
                        Ainda não possui uma conta?
                        <a href="/register" class="link link-primary">Crie uma!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>