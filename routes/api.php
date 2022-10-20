<?php

use App\Http\Controllers\DocumentoCsvController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('salvar', [DocumentoCsvController::class, 'store']);
Route::get('listar', [DocumentoCsvController::class, 'index']);
Route::get('consultar', [DocumentoCsvController::class, 'consultar']);
Route::get('download', [DocumentoCsvController::class, 'download']);
