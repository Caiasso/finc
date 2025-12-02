<?php

use App\Models\Categoria;
use App\Models\Movimentacao;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MovimentacaoController;

Route::get('/', function () {
    // Se não houver usuário logado, redireciona para login
    if (!auth()->check()) {
        return view('login');
    }

    $user = auth()->user();

    $categorias = Categoria::where('user_id', $user->id)->get();

    $movimentacoes = Movimentacao::where('user_id', $user->id)
        ->where('created_at', '>=', now()->subDays(30))
        ->orderBy('created_at', 'desc')
        ->get();

    $entradas30 = $user->movimentacao()
        ->where('tipo_movimentacao', 1)
        ->where('created_at', '>=', now()->subDays(30))
        ->sum('valor_movimentacao');

    $saidas30 = $user->movimentacao()
        ->where('tipo_movimentacao', 2)
        ->where('created_at', '>=', now()->subDays(30))
        ->sum('valor_movimentacao');

    $saldo30 = $entradas30 - $saidas30;

    return view('home', compact(
        'categorias',
        'movimentacoes',
        'entradas30',
        'saidas30',
        'saldo30'
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
