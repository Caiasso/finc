<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Movimentacao;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'valor_movimentacao' => ['required', 'numeric'],
            'categoria_id' => ['required', 'integer'],
            'tipo_movimentacao' => ['required', 'integer'],
            'descricao' => ['string']
        ]);

        auth()->user()->movimentacao()->create($validated);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimentacao $movimentacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimentacao $movimentacao)
    {
        if ($movimentacao->user_id !== auth()->id()) {
            abort(403);
        }

        $categorias = Categoria::where('user_id', auth()->id())->get();

        return view('edit', compact('movimentacao', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimentacao $movimentacao)
    {
        if ($movimentacao->user_id !== auth()->id()) {
            abort(403);
        }

        $movimentacao->update($request->validate([
            'valor_movimentacao' => 'required|numeric',
            'descricao' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]));

        return redirect('/')->with('success', 'Movimentação atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimentacao $movimentacao)
    {
        // Segurança: impedir deletar movimentação de outro usuário
        if ($movimentacao->user_id !== auth()->id()) {
            abort(403);
        }

        $movimentacao->delete();

        return redirect('/')
            ->with('success', 'Movimentação deletada com sucesso!');
    }
}
