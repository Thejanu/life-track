<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function handle(Request $request): View
    {
        return view('admins.handle', [
            'user' => User::where("role", "Integration"),
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
