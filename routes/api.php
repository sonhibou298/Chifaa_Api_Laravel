<?php

use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('user', [UserController::class, 'store'])->name('addUser');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('deleteUser');
Route::put('user/{id}', [UserController::class, 'update'])->name('updateUser');
Route::get('user/{id}', [UserController::class, 'show'])->name('showUser');

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('users/search/{prenom}', [UserController::class, 'search'])->name('search');
    Route::get('users', [UserController::class, 'index'])->name('listUsers');
});

/*--------------------------------------------------------------------------------------
                                    Route Medecin
---------------------------------------------------------------------------------------*/
Route::get('medecins', [MedecinController::class, 'index'])->name('listMedecins');
Route::put('medecin/{id}', [UserController::class, 'update'])->name('updateProfilMedecin');
Route::put('medecin/{id}', [MedecinController::class, 'update'])->name('updateServiceMedecin');
Route::delete('medecin/{id}', [MedecinController::class, 'destroy'])->name('deleteMedecin');
Route::get('medecin/{id}', [MedecinController::class, 'show'])->name('infoMedecin');
Route::post('medecin', [MedecinController::class, 'store'])->name('addMedecin');

/*--------------------------------------------------------------------------------------
                                    Route Patient
---------------------------------------------------------------------------------------*/
Route::get('patients', [PatientController::class, 'index'])->name('listPatients');
