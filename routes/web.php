<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

//Route::match(['get', 'post'], '/bulletin', [SiteController::class, 'bulletin'])->name('bulletin');

//Route::get('/dashboard', [SiteController::class, 'index'])->name('home')->middleware(['auth']);

//Le home
Route::get('/', [SiteController::class, 'index'])->name('home')->middleware(['auth']);

Route::get('/home', [SiteController::class, 'index'])->name('home')->middleware(['auth']);

//Le tableau de bord
Route::get('/dashboard', [SiteController::class, 'index'])->name('home')->middleware(['auth']);

//Catégories
Route::match(['get', 'post'], '/addCategorie', [SiteController::class, 'addCategorie'])->name('addCategorie');

Route::get('/showCategorie', [SiteController::class, 'showCategorie'])->name('showCategorie')->middleware(['auth']);

//Produits
Route::match(['get', 'post'], '/addProduit', [SiteController::class, 'addProduit'])->name('addProduit');

Route::get('/showProduit', [SiteController::class, 'showProduit'])->name('showProduit')->middleware(['auth']);

Route::match(['get', 'post'], '/addProduitStock', [SiteController::class, 'addProduitStock'])->name('addProduitStock');

//Recettes
Route::match(['get', 'post'], '/addRecettes', [SiteController::class, 'addRecettes'])->name('addRecettes');

Route::get('/showRecettes', [SiteController::class, 'showRecettes'])->name('showRecettes')->middleware(['auth']);

//Ventes
Route::match(['get', 'post'], '/addVentes', [SiteController::class, 'addVentes'])->name('addVentes');

Route::match(['get', 'post'], '/showVentePeriode', [SiteController::class, 'showVentePeriode'])->name('showVentePeriode')->middleware(['auth']);

Route::match(['get', 'post'], '/showVentesDays', [SiteController::class, 'showVentesDays'])->name('showVentesDays');

Route::match(['get', 'post'], '/addVentesLignes/{id}', [SiteController::class, 'addVentesLignes'])->name('addVentesLignes');

Route::match(['get', 'post'], '/ventes/details/{id}', [SiteController::class, 'ventesDetails'])->name('ventesDetails');

//Constantes
Route::match(['get', 'post'], '/addConstantes', [SiteController::class, 'addConstantes'])->name('addConstantes');

Route::get('/showConstantes', [SiteController::class, 'showConstantes'])->name('showConstantes')->middleware(['auth']);

//Caisse
Route::match(['get', 'post'], '/OperationCompte', [SiteController::class, 'OperationCompte'])->name('OperationCompte');

Route::match(['get', 'post'], '/recevoirCredit', [SiteController::class, 'recevoirCredit'])->name('recevoirCredit');



require __DIR__.'/auth.php';
