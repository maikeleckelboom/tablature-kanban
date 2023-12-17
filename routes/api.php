<?php

use App\Http\Controllers\Kanban\BoardController;
use App\Http\Controllers\Kanban\CardController;
use App\Http\Controllers\Kanban\CardsReorderController;
use App\Http\Controllers\Kanban\ColumnController;
use App\Http\Controllers\Kanban\ColumnsReorderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'kanban', 'as' => 'kanban.'], function () {
    Route::resource('boards', BoardController::class)->only(['index', 'show', 'store', 'destroy']);
    Route::resource('columns', ColumnController::class)->except(['index', 'show','update']);
    Route::resource('columns.cards', CardController::class)->except(['index', 'show']);
    Route::put('cards/reorder', CardsReorderController::class)->name('cards.reorder');
    Route::put('columns/reorder', ColumnsReorderController::class)->name('columns.reorder');
});
