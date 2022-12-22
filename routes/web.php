<?php

use App\Http\Controllers\ProfileController;
use App\Models\Maintenance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MaintenanceController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $start = today();
    $end = today()->addDays(7);
    $maintenances = Maintenance::where('user_id', Auth::id())->whereBetween('date', [$start, $end])->get();
    return view('dashboard', ['maintenances' => $maintenances]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/vehicles', VehicleController::class)->middleware('auth:sanctum');
Route::resource('/maintenances', MaintenanceController::class)->middleware('auth:sanctum');


require __DIR__.'/auth.php';
