<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicalRecordTypeController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/my-medical-profile', [MedicalRecordController::class, 'view'])->name('medicalProfile');
    Route::match(['get', 'post'], '/add-record', [MedicalRecordController::class, 'add'])->name('user.addRecord');
});

Route::middleware(['auth', 'role:Staff'])->group(function () {
    Route::match(['get', 'post'], '/search-medical-profiles', [MedicalRecordController::class, 'search'])->name('searchMedicalProfiles');
    Route::match(['get', 'post'], '/add-record', [MedicalRecordController::class, 'add'])->name('user.addRecord');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::match(['get', 'post'], '/admins', [AdminController::class, 'handle'])->name('handleAdmins');
    Route::match(['get', 'post'], '/staff', [StaffController::class, 'handle'])->name('handleStaff');
    Route::match(['get', 'post'], '/integrations', [IntegrationController::class, 'handle'])->name('handleIntegrations');
    Route::match(['get', 'post'], '/medical-categories', [MedicalRecordTypeController::class, 'handle'])->name('medicalCategories');

    Route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
});

require __DIR__ . '/auth.php';
