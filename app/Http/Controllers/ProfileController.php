<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function my_children(Request $request): View
    {
        $children = User::where('parent_id', $request->user()->id)->get();


        return view('user.my-children', [
            'children' => $children,
        ]);
    }

    public function add_child(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'nic' => 'required|unique:users|max:255',
                'name' => 'required',
            ]);

            // add the new user
            User::create([
                'name' => $request->name,
                'email' => time() . "@gmail.com",
                'nic' => $request->nic,
                'dob' => $request->dob,
                'role' => 'User',
                'password' => '',
                'parent_id' => $request->user()->id,
            ]);

            session()->flash('message', 'User added successfully.');


            return redirect('/my-children');
        }
        return view('user.add-child', [
            'children' => [],
        ]);
    }
}
