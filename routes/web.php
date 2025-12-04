<?php

use App\Models\Categoria;
use App\Models\Movimentacao;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MovimentacaoController;

Route::get('/', function () {
    if (!auth()->check()) {
        return view('login');
    }

    $user = auth()->user();

    // Datas do mês atual
    $inicioMes = now()->startOfMonth();
    $fimMes = now()->endOfMonth();

    // Categorias do usuário
    $categorias = Categoria::where('user_id', $user->id)->get();

    // Movimentações apenas do mês atual
    $movimentacoes = Movimentacao::where('user_id', $user->id)
        ->whereBetween('created_at', [$inicioMes, $fimMes])
        ->orderBy('created_at', 'desc')
        ->get();

    // Entradas do mês atual
    $entradasMes = $user->movimentacao()
        ->where('tipo_movimentacao', 1)
        ->whereBetween('created_at', [$inicioMes, $fimMes])
        ->sum('valor_movimentacao');

    // Saídas do mês atual
    $saidasMes = $user->movimentacao()
        ->where('tipo_movimentacao', 2)
        ->whereBetween('created_at', [$inicioMes, $fimMes])
        ->sum('valor_movimentacao');

    // Saldo do mês atual
    $saldoMes = $entradasMes - $saidasMes;

    //total de movimentacoes
    $totalEntradas = Movimentacao::where('user_id', auth()->id())
        ->where('tipo_movimentacao', 1)
        ->sum('valor_movimentacao');

    $totalSaidas = Movimentacao::where('user_id', auth()->id())
        ->where('tipo_movimentacao', 2)
        ->sum('valor_movimentacao');

    $saldoTotal = $totalEntradas - $totalSaidas;


    // Saldo total do usuário (todas as movimentações)
    $entradasTotal = $user->movimentacao()
        ->where('tipo_movimentacao', 1)
        ->sum('valor_movimentacao');

    $saidasTotal = $user->movimentacao()
        ->where('tipo_movimentacao', 2)
        ->sum('valor_movimentacao');

    $saldoTotal = $entradasTotal - $saidasTotal;


    $movimentacoesMesTicker = \App\Models\Movimentacao::where('user_id', auth()->id())
        ->whereMonth('created_at', now()->month)
        ->orderBy('created_at', 'desc')
        ->get();




    return view('home', compact(
        'categorias',
        'movimentacoes',
        'entradasMes',
        'saidasMes',
        'saldoMes',
        'saldoTotal',
        'totalEntradas',
        'totalSaidas',
        'movimentacoesMesTicker'
    ));
});




Route::middleware('auth')->group(function () {

    Route::post('/movimentacoes', [MovimentacaoController::class, 'store']);
    Route::get('/movimentacoes/{movimentacao}/edit', [MovimentacaoController::class, 'edit']);
    Route::put('/movimentacoes/{movimentacao}', [MovimentacaoController::class, 'update']);
    Route::delete('/movimentacoes/{movimentacao}', [MovimentacaoController::class, 'destroy']);

});


/* LOGIN E REGISTER */
Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::get('/register', function () {
    return view('register');
})->middleware('guest')->name('register');

Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

/* LOGOUT */
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');




/* CATEGORIAS */
Route::get('/addCategoria', function () {
    return view('addCategoria');
});
Route::post('/addCategoria', [CategoriaController::class, 'store']);



Route::get('/graficos/gastos', function () {
    $dias = request('dias');

    $query = Movimentacao::where('user_id', auth()->id())
        ->where('tipo_movimentacao', 2); // somente GASTOS

    if ($dias > 0) {
        $query->where('created_at', '>=', now()->subDays($dias));
    }

    $gastos = $query->selectRaw('categoria_id, SUM(valor_movimentacao) as total')
        ->groupBy('categoria_id')
        ->get();

    $labels = [];
    $valores = [];

    foreach ($gastos as $g) {
        $categoria = Categoria::find($g->categoria_id);
        $labels[] = $categoria->nome;
        $valores[] = $g->total;
    }

    return response()->json([
        'labels' => $labels,
        'valores' => $valores
    ]);
});
