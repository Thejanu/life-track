<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class IntegrationController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function handle(Request $request)
    {

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'email' => 'required|unique:users|max:255',
                'name' => 'required',
                'password' => 'required',
            ]);

            // add the new user
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'Integration',
                'password' => $request->password,
            ]);

            session()->flash('message', 'User added successfully.');


            return redirect()->back();
        }
        return view('integrations.view', [
            'users' => User::where("role", "Integration")->get(),
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
