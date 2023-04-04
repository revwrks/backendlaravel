<?php

use App\Http\Controllers\mhscon;
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
Route::get('mahasiswa', [mhscon::class, 'summon']);
Route::get('mahasiswa/{id}', [mhscon::class, 'search']);
Route::post('mahasiswa', [mhscon::class, 'sculpt']);
Route::patch('mahasiswa/{id}', [mhscon::class, 'update']);
Route::delete('mahasiswa/{id}', [mhscon::class, 'destroy']);

Route::get('buku', [bukucon::class, 'summon']);
Route::get('buku/{id}', [bukucon::class, 'search']);
Route::post('buku', [bukucon::class, 'sculpt']);
Route::patch('buku/{id}', [bukucon::class, 'update']);
Route::delete('buku/{id}', [bukucon::class, 'destroy']);
