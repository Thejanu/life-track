<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\MedicalRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MedicalRecordController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function view(Request $request): View
    {

        $records = MedicalRecord::with('type')->where('user_id', $request->user()->id)->get();

        return view('user.my-medical-profile', [
            'user' => $request->user(),
            'records' => $records
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function add(Request $request): View
    {

        return view('user.add-record', [
            'user' => $request->user(),
        ]);
    }
}
