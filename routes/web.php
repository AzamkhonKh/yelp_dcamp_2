<?php

use App\Http\Controllers\Admin\OrganisationController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\ProfileController;
use App\Models\Organisation;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MyAuth;

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

Route::get('/', [OrganisationController::class, 'index'])->name('web.organisation.index');
Route::middleware('myauth:admin')->prefix('panel')->group(function () {
    Route::get('/', [OrganisationController::class, 'index'])->name('web.organisation.index');
    Route::get('/organisation', [OrganisationController::class, 'index'])->name('web.organisation.index');
    Route::get('/organisation/show/{id}', [OrganisationController::class, 'show'])->name('web.organisation.show');
    Route::get('/reqre/organisation/{id}', [OrganisationController::class, 'edit'])
        ->name('web.organisation.edit')
        ->where(['id' => '[0-9]+']);
    Route::put('/organisation/{id}', [OrganisationController::class, 'update'])
        ->name('web.organisation.update')
        ->where(['id' => '[0-9]+']);
    Route::delete('/organisation/{id}', [OrganisationController::class, 'destroy'])->name('web.organisation.destroy');
    Route::get('/organisation/create', [OrganisationController::class, 'create'])->name('web.organisation.create');
    Route::post('/organisation/create', [OrganisationController::class, 'store'])->name('web.organisation.store');
    Route::name('web.')->group(function () {
        Route::resource('/tag', TagsController::class, ['except' => ['show', 'create', 'edit']]);
    });
});

require __DIR__.'/auth.php';
