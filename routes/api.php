<?php

use App\Http\Controllers\ApiLocationController;
use App\Http\Controllers\ApiLoginController;
use App\Models\Checkpoint;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/check-location', [ApiLocationController::class, 'checkLocation']);

    Route::get('/checkpoints', function () {
        $checkpoints = Checkpoint::get();

        return response([
            'checkpoints'=>$checkpoints,
        ], 200);
    });
});


Route::post('login', [ApiLoginController::class, 'login']);

Route::get('/test', function () {
    return 'oh yeah! yes!';
});
