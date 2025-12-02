<x-layout>
    <x-slot:title>
        Editar movimentação
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Editar movimentação</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/movimentacoes/{{ $movimentacao->id }}">
                    @csrf
                    @method('PUT')

                    {{-- VALOR --}}
                    <label class="floating-label mb-6">
                        <input type="number" step="0.01" name="valor_movimentacao"
                            value="{{ old('valor_movimentacao', $movimentacao->valor_movimentacao) }}"
                            class="input input-bordered @error('valor_movimentacao') input-error @enderror"
                            required>
                        <span>Valor da movimentação</span>
                    </label>

                    @error('valor_movimentacao')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- DESCRIÇÃO --}}
                    <label class="floating-label mb-6">
                        <input type="text" name="descricao"
                            value="{{ old('descricao', $movimentacao->descricao) }}"
                            class="input input-bordered @error('descricao') input-error @enderror">
                        <span>Descrição</span>
                    </label>

                    @error('descricao')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- CATEGORIA --}}
                    <div class="form-control w-full mb-6">
                        <select name="categoria_id" class="select select-bordered w-full bg-base-100 text-base-content" required>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ old('categoria_id', $movimentacao->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- BOTÕES --}}
                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Atualizar movimentação
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
