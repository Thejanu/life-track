<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use File;

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
            $userId = $request->user()->id;
            if ($request->user()->role === "Staff") {
                $user = User::where('nic', '=', $request->nic)->first();
                if (!$user) {
                    session()->flash('error_message', 'User not found.');
                    return redirect()->back();
                }
                $userId = $user->id;
            }
            $record = MedicalRecord::insert([
                'user_id' => $userId,
                'medical_record_type_id' => $request->medical_record_type_id,
                'details' => $request->details,
                'location' => $request->location,
                'date' => $request->date,
            ]);

            $assets = $request->file('assets');

            if ($record->id &&  $assets) {
                // store the images


                foreach ($assets as $key => $file) {
                    # code...
                    $ext = $file->getClientOriginalExtension();
                    Storage::disk('local')->put("complaints/$record->id/$key.$ext", file_get_contents($file));
                }
            }

            session()->flash('message', 'Record added successfully.');

            return redirect()->back();
        }

        $types = MedicalRecordType::orderBy('name', 'asc')->get();


        return view('user.add-record', [
            'user' => $request->user(),
            'types' => $types
        ]);
    }

    public function search(Request $request)
    {

        $records = [];
        $user = null;

        if ($request->isMethod('post')) {
            $user = User::where('nic', '=', $request->nic)->first();
            $records = MedicalRecord::with('type')->where('user_id', $user->id)->orderBy('date', 'desc')->get();
        }


        return view('staff.search', [
            'records' => $records, 'user' => $user,
        ]);
    }
}
