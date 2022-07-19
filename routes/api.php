<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
/*--------------------------------------------------------------------------------------
                                    Route Role
---------------------------------------------------------------------------------------*/
Route::get('roles', [RoleController::class, 'index'])->name('listRoles');
Route::post('role', [RoleController::class, 'store'])->name('addRole');
Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('deleteRole');
Route::put('role/{id}', [RoleController::class, 'update'])->name('updateRole');

/*--------------------------------------------------------------------------------------
                                    Route User
---------------------------------------------------------------------------------------*/
Route::get('users', [UserController::class, 'index'])->name('listUsers');
Route::post('user', [UserController::class, 'store'])->name('addUser');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('deleteUser');
Route::put('user/{id}', [UserController::class, 'update'])->name('updateUser');
Route::get('user/{id}', [UserController::class, 'show'])->name('showUser');

/*--------------------------------------------------------------------------------------
                                    Route User
---------------------------------------------------------------------------------------*/

