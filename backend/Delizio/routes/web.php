<?php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\emails\EmailController;

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

Route::get('/', [AccueilController::class, 'index'])->name('pageAccueil');
Route::get('/admin', [HomeController::class, 'adminView'])->name('admin.view')->middleware('IsAdmin');
Route::get('/accueil', [HomeController::class, 'index'])->name('accueil');
Route::get('/contact', [ContactController::class, 'index'])->name('contacter');

Route::controller(RecetteController::class)->group(function () {
    Route::get('/recettes', 'index')->name('liste');
    Route::get('/recette/creer', 'create')->name('creer')->middleware('auth');
    Route::get('/recette/details/{id}', 'show')->name('recipe.show');
    Route::get('/recette/modifier/{id}', 'edit')->name('modifier.{id}');
    Route::put('/recette/update/{id}', 'update')->name('recette.update');
    Route::get('/recette/supprimer/{id}', 'destroy')->name('supprimer.{id}');
    Route::get('/recette/export/{id}', 'export')->name('export.{id}');
    Route::get('/categories/top/recettes', 'categorie')->name('recette.categories');
    Route::get('/top/recettes', 'topRecettes')->name('filtrer');
    Route::post('/recette/enregistrer', 'store')->name('enregistrer')->middleware('auth');
    Route::post('/like-recette/{id}', 'likeRecette')->name('like.recette');
    Route::post('/unlike-recette/{id}', 'unlikeRecette')->name('unlike.recette');
});

Route::controller(MessageController::class)->group(function () {
    Route::post('/message/send', 'create')->name('message.create');
    Route::get('/message/supprimer/{id}', 'destroy')->name('message.destory');
    Route::get('/remerciement', 'merci')->name('merci');
});

Route::controller(CategorieController::class)->group(function () {
    route::middleware(['Auth','IsAdmin'])->group(function(){
    Route::get('/categorie/create', 'create')->name('categorie.create')->middleware('auth');
    Route::post('/categorie/store', 'store')->name('categorie.store')->middleware('auth');
    Route::get('/categorie/index', 'index')->name('categorie.index')->middleware('auth');
    Route::get('/categorie/delete/{id}', 'destroy')->name('categorie.destroy');
    Route::get('/categorie/edit', 'edit')->name('categorie.edit');
        }
        );
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/user/delete/{id}', 'destroy')->name('user.destroy');
    Route::get('/user/edit/{id}', 'edit')->name('user.edit');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/user/profile/', 'showProfile')->name('profile.show')->middleware('auth');
});

Route::controller(DocumentController::class)->group(function () {
    Route::get('/recette/export/{id}', 'exportPDF')->name('documents.recipe');
    Route::get('/recette/show-pdf/{id}', 'showExport')->name('documents.show');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/comment/ajotuer/{id}', 'store')->name('comment.store')->middleware('auth');
});

Route::controller(EmailController::class)->group(function () {
    Route::get('/send/mail/{id}', 'send')->name('email.send');
});