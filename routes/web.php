<?php

use App\Http\Controllers\BoncommandeController;
use App\Http\Controllers\ChauffeurvehiculeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\SoccaController;
use App\Http\Controllers\StatuscommandeController;
use App\Http\Controllers\StatusfactureController;
use App\Http\Controllers\TypevehiculeController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

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

// route vers la page d'acceuil
Route::get('/', [SoccaController::class, 'index'])->name('home');

//les routes vers les clients
Route::resource('clients', ClientController::class);


//les routes d'assignation chauffeurs et vehicules
Route::get('cars/{car}/assigne',[ChauffeurvehiculeController::class, 'assignechauffeur'])->name('cars.assigne');
Route::get('chauffeurs/{chauffeur}/assigne',[ChauffeurvehiculeController::class, 'assignevehicule'])->name('chauffeurs.assigne');
Route::post('assignecars',[ChauffeurvehiculeController::class, 'storevehicule'])->name('assigne.cars.store');
Route::post('assignechauffeurs',[ChauffeurvehiculeController::class, 'storechauffeur'])->name('assigne.chauffeurs.store');

//les routes vers les vehicules
Route::resource('cars', VehiculeController::class);


//les routes vers les propriétaires de vehicules
Route::get('propretaires',[PersonneController::class, 'indexproprio'])->name('proprio.index');
Route::get('propretaires/create',[PersonneController::class, 'createproprio'])->name('proprio.create');
Route::post('propretaires',[PersonneController::class, 'storeproprio'])->name('proprio.store');
Route::get('propretaires/{propretaire}',[PersonneController::class, 'showproprio'])->name('proprio.show');
Route::get('propretaires/{propretaire}/edit',[PersonneController::class, 'editproprio'])->name('proprio.edit');
Route::post('propretaires/{propretaire}',[PersonneController::class, 'editproprio'])->name('proprio.update');

//les routes vers les chauffeurs de vehicules
Route::get('chauffeurs',[PersonneController::class,'indexchauffeur'])->name('chauffeurs.index');
Route::post('chauffeurs',[PersonneController::class, 'storechauffeur'])->name('chauffeurs.store');
Route::get('chauffeurs/create',[PersonneController::class, 'createchauffeur'])->name('chauffeurs.create');
Route::get('chauffeurs/{chauffeur}',[PersonneController::class, 'showchauffeur'])->name('chauffeurs.show');
Route::get('chauffeurs/{chauffeur}/edit',[PersonneController::class, 'editchauffeur'])->name('chauffeurs.edit');
Route::post('chauffeurs/{chauffeur}',[PersonneController::class, 'editchauffeur'])->name('chauffeurs.update');

Route::resource('personnes', PersonneController::class);

//les routes vers les bons de commandes
Route::resource('commandes', BoncommandeController::class);

//les routes vers les postes de travail
Route::resource('fonctions', FonctionController::class);

//les routes vers types de vehicules
Route::resource('typevehicules', TypevehiculeController::class);

//les routes vers les status des commandes
Route::resource('statuscommandes', StatuscommandeController::class);

//les routes vers les status des factures
Route::resource('statusfactures', StatusfactureController::class);
