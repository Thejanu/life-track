<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function add(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
