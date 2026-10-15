<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\MedicalRecordType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MedicalRecordTypeController extends Controller
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
    public function handle(Request $request)
    {

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required',
                'details' => 'required',
            ]);

            // add the new user
            MedicalRecordType::create([
                'name' => $request->name,
                'details' => $request->details,
                'should_validate' => true,
            ]);

            session()->flash('message', 'Type added successfully.');


            return redirect()->back();
        }

        $categories = MedicalRecordType::get();

        return view('medical-record-types', [
            'categories' => $categories,
        ]);
    }
}
