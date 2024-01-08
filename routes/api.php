<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RiceProductionByDistrictsController;
use App\Http\Resources\RiceProductionByDistrictsResource;
use App\Http\Requests\RiceProductionByDistrictsRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/RiceProductionByDistricts', [RiceProductionByDistrictsController::class, 'index']);
Route::get('/RiceProductionByDistricts/{id}', [RiceProductionByDistrictsController::class, 'show']);
Route::put('/RiceProductionByDistricts/{id}', [RiceProductionByDistrictsController::class, 'update']);
Route::post('/RiceProductionByDistricts', [RiceProductionByDistrictsController::class, 'store']);
Route::delete('/RiceProductionByDistricts/{id}', [RiceProductionByDistrictsController::class, 'destroy']);
