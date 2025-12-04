<x-layout>
    <x-slot:title>
        Adicionar categoria
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Vamos adicionar uma categoria!</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/addCategoria">
                    @csrf

                    <div class="form-control w-full">
                        <input type="text" name="nome" class="input input-bordered w-full resize-none" required></input>
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Voltar
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>