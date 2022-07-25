<?php

use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProcheController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TarifController;
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
Route::get('users', [UserController::class, 'index'])->name('listUsers');

Route::post('user', [UserController::class, 'store'])->name('addUser');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('deleteUser');
Route::put('user/{id}', [UserController::class, 'update'])->name('updateUser');
Route::get('user/{id}', [UserController::class, 'show'])->name('showUser');

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('users/search/{prenom}', [UserController::class, 'search'])->name('search');
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
Route::put('patient/{id}', [UserController::class, 'update'])->name('updatePatient');
Route::get('patient/{id}', [UserController::class, 'show'])->name('infoPatient');
Route::delete('patient/{id}', [UserController::class, 'destroy'])->name('deletePatient');

/*--------------------------------------------------------------------------------------
                                    Route Proche
---------------------------------------------------------------------------------------*/
Route::get('proches', [ProcheController::class, 'index'])->name('listProche');
Route::get('proche/{id}', [ProcheController::class, 'show'])->name('infoProche');
Route::get('proche/{id}', [ProcheController::class, 'destroy'])->name('deleteProche');
Route::put('proche/{id}', [ProcheController::class, 'update'])->name('updateProche');
Route::post('proche', [ProcheController::class, 'store'])->name('addProche');

/*--------------------------------------------------------------------------------------
                                    Route Service
---------------------------------------------------------------------------------------*/
Route::get('services', [ServiceController::class, 'index'])->name('listServices');
Route::get('service/{id}', [ServiceController::class, 'show'])->name('infoService');
Route::get('service/{id}', [ServiceController::class, 'destroy'])->name('deleteService');
Route::put('service/{id}', [ServiceController::class, 'update'])->name('updateService');
Route::post('service', [ServiceController::class, 'store'])->name('addService');

/*--------------------------------------------------------------------------------------
                                    Route Tarif
---------------------------------------------------------------------------------------*/
Route::get('tarifs', [TarifController::class, 'index'])->name('listTarifs');
Route::get('tarif/{id}', [TarifController::class, 'show'])->name('infoTarif');
Route::get('tarif/{id}', [TarifController::class, 'destroy'])->name('deleteTarif');
Route::put('tarif/{id}', [TarifController::class, 'update'])->name('updateTarif');
Route::post('tarif', [TarifController::class, 'store'])->name('addTarif');

/*--------------------------------------------------------------------------------------
                                    Route Rendez-vous
---------------------------------------------------------------------------------------*/
Route::get('rendezVous', [RendezvousController::class, 'index'])->name('listRendezVous');
Route::get('rendezVous/{id}', [RendezvousController::class, 'show'])->name('infoRendezVous');
Route::get('rendezVous/{id}', [RendezvousController::class, 'destroy'])->name('deleteRendezVous');
Route::put('rendezVous/{id}', [RendezvousController::class, 'update'])->name('updateRendezVous');
Route::post('rendezVous', [RendezvousController::class, 'store'])->name('addRendezVous');
