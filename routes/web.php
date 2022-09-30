<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReclamationController;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth');
Route::get('/stock', [HomeController::class, 'stock'])->middleware('auth');
Route::get('/reclamation/resolved', [ReclamationController::class, 'resolved'])->name('reclamation.resolved.list');
Route::get('/reclamation/rejected', [ReclamationController::class, 'rejected'])->name('reclamation.rejected.list');
Route::get('/reclamation/restore/{id}', [ReclamationController::class, 'restoreReclamation'])->name('reclamation.restore');
Route::resource('departement', DepartementController::class);
Route::resource('user', UserController::class);
Route::resource('article', ArticleController::class);
Route::resource('categorie', CategorieController::class);
Route::resource('commande', CommandeController::class)->only(['create', 'store']);
Route::resource('reclamation', ReclamationController::class);

Route::get('commande/create/informatique', [CommandeController::class, 'informatique'])->name('commande.create.informatique');
Route::get('commande/create/bureau', [CommandeController::class, 'bureau'])->name('commande.create.bureau');
Route::get('commande/create/maintenance', [CommandeController::class, 'maintenance'])->name('commande.create.maintenance');
Route::delete('commande/{commande_number}', [CommandeController::class, 'rejectCommande'])->name('commande.reject');
Route::get('/commande/restore/{commande_number}', [CommandeController::class, 'restoreCommande'])->name('commande.restore');
Route::post('stock/pdf', [CommandeController::class, 'summaryCommandes'])->name('stock.summary');
Route::get('stock', [CommandeController::class, 'summaryCommandes'])->name('stock');

Route::get('/commande/standby', [CommandeController::class, 'standby'])->name('commande.standby.list');
Route::get('/commande/approved', [CommandeController::class, 'approved'])->name('commande.approved.list');
Route::get('/commande/rejected', [CommandeController::class, 'rejected'])->name('commande.rejected.list');

Route::get('/commande/{commande_number}', [CommandeController::class, 'showCommande'])->name('commande.show');
Route::get('/commande/rejected/{commande_number}', [CommandeController::class, 'showRejectedCommande'])->name('commande.rejected.show');
Route::get('/commande/approved/{commande_number}', [CommandeController::class, 'showApprovedCommande'])->name('commande.approved.show');
Route::patch('/commande/{commande_number}', [CommandeController::class, 'approveCommande'])->name('commande.approve');

Route::post('/addToList', [CommandeController::class, 'addToList'])->name('list.add');
Route::post('/clearList', [CommandeController::class, 'clearList'])->name('list.clear');
Route::put('/updateList/{id}', [CommandeController::class, 'updateList'])->name('list.update');
Route::post('/removeArticle/{id}', [CommandeController::class, 'removeFromList'])->name('list.destroy');

Route::get('/commande/pdf/{commande_number}', [CommandeController::class, 'approvedCommandePDF'])->name('commande.approvedCommandePDF');
Route::get('/reclamation/pdf/', [ReclamationController::class, 'approvedReclamationPDF'])->name('reclamation.approvedReclamationPDF');

