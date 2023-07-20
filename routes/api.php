<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerApi;
use App\Http\Controllers\linksController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\visitsController;
use App\Http\Controllers\password_resetsController;
use App\Http\Controllers\createController;
use App\Http\Controllers\linksControllerApi;
use App\Http\Controllers\Api\AuthController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('data', [registerApi::class, 'getData']);

Route::get('ReadLinks', [linksController::class, 'ReadLinks']);
Route::get('listUsers', [usersController::class, 'listUsers']);
Route::get('listVisits', [visitsController::class, 'listVisits']);
Route::get('listPassword_resets', [
    password_resetsController::class,
    'listPassword_resets',
]);
Route::get('login', [loginController::class, 'login']);
Route::get('listUsers', [usersController::class, 'listUsers']);

//GET -> Search Link
Route::get('search/{name}', [createController::class, 'search']);

//POST -> Create Link
Route::post('createLink', [createController::class, 'createLink']);
Route::post('save', [createController::class, 'testData']); //validation

//POST -> User
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);


//PUT -> Update Link
Route::put('updateLink', [createController::class, 'updateLink']);
Route::put('testUpdateLink', [createController::class, 'testUpdateLink']); //validation update

//DELETE ->Delete Link
Route::delete('deleteLink/{id}', [createController::class, 'deleteLink']);

//Api Resource
//Route::apiResource('link', linksControllerApi::class);
