<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('family', FamilyController::class);
Route::get('family/delete/{id}', [FamilyController::class, 'destroy'])->name('family.delete');
Route::get('family/treeView', [FamilyController::class, 'familyTree'])->name('family.treeView');
Route::post('family/update/{id}', [FamilyController::class, 'update'])->name('family.update');

Route::get('/', function () {
    redirect('family');
});
