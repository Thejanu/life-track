<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordType;
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

        $records = MedicalRecord::with('type')->where('user_id', $request->user()->id)->orderBy('date', 'desc')->get();

        return view('user.my-medical-profile', [
            'user' => $request->user(),
            'records' => $records
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function add(Request $request)
    {

        if ($request->isMethod('post')) {
            MedicalRecord::insert([
                'user_id' => $request->user()->id,
                'medical_record_type_id' => $request->medical_record_type_id,
                'details' => $request->details,
                'location' => $request->location,
                'date' => $request->date,
            ]);

            session()->flash('message', 'Record added successfully.');

            return redirect()->back();
        }

        $types = MedicalRecordType::orderBy('name', 'asc')->get();


        return view('user.add-record', [
            'user' => $request->user(),
            'types' => $types
        ]);
    }
}
