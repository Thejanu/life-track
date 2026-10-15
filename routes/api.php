<?php

use App\Http\Controllers\MedicalRecordController;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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

Route::post('/auth/login', function (Request $request) {
    // log in
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $data = new \stdClass();

    $user = User::where('email', $request->email)->first();

    if ($user->role != "Integration") {
        $data->error = "The account type is not supported.";
        return $data;
    }


    if (
        !$user || !Hash::check($request->password, $user->password)
    ) {
        $data->error = "The provided credentials are incorrect.";
        return $data;
    }

    $data->token = $user->createToken($user->email)->plainTextToken;

    return $data;
});

Route::middleware('auth:sanctum')->get('/user-data/{nic}', function ($nic) {

    $data = new \stdClass();

    $user = User::where('nic', $nic)->first();

    $data->name = $user->name;
    $data->nic = $user->nic;
    $data->dob = $user->dob;
    $data->blood_group = $user->blood_group;

    $data->medicalRecords = MedicalRecord::where('user_id', $user->id)->get();

    $data->medicalRecordTypes = MedicalRecordType::get();


    return $data;
});
