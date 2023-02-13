<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FamilyController;

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

Route::prefix('/family')->group(function() {
    Route::get('/', [FamilyController::class, 'index'])->name('api.get.family');
    Route::get('/{id}', [FamilyController::class, 'show'])->name('api.detail.family');
    Route::post('/', [FamilyController::class, 'store'])->name('api.post.family');
    Route::put('/{id}', [FamilyController::class, 'update'])->name('api.put.family');
    Route::delete('/{id}', [FamilyController::class, 'destroy'])->name('api.delete.family');
});
