<?php

use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\TagController;
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

Route::apiResource('/organisation', OrganisationController::class, ['except' => ['show']]);
Route::apiResource('/tag', TagController::class, ['except' => ['show']]);

Route::get('/organisation/{id}/comment', [OrganisationController::class, 'comments']);
Route::post('/organisation/{id}/comment', [OrganisationController::class, 'store_comment']);
Route::delete('/organisation/{id}/comment/{comment_id}', [OrganisationController::class, 'destroy_comment']);
Route::put('/organisation/{id}/comment/{comment_id}', [OrganisationController::class, 'edit_comment']);
