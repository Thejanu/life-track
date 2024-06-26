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


        $user_id = $request->id ? $request->id : $request->user()->id;

        $user = $request->id ? User::find($request->id) : $request->user();


        $records = MedicalRecord::with('type')->where('user_id', $user_id)->orderBy('date', 'desc')->get();

        return view('user.my-medical-profile', [
            'user' => $user,
            'records' => $records
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function add(Request $request)
    {

        if ($request->user()->role !== "Staff" && $request->user()->role !== "User") {
            return redirect("/dashboard");
        }

        if ($request->isMethod('post')) {
            $userId = $request->user()->id;
            if ($request->nic) {
                $user = User::where('nic', '=', $request->nic)->first();
                if (!$user) {
                    session()->flash('error_message', 'User not found.');
                    return redirect()->back();
                }
                $userId = $user->id;
            }

            $record = new MedicalRecord();

            $record->user_id = $userId;
            $record->medical_record_type_id = $request->medical_record_type_id;
            $record->details = $request->details;
            $record->location = $request->location;
            $record->date = $request->date;

            $record->save();

            print_r($record);

            $assets = $request->file('assets');

            if ($record->id &&  $assets) {
                // store the images


                foreach ($assets as $key => $file) {
                    # code...
                    $ext = $file->getClientOriginalExtension();
                    Storage::disk('local')->put("medical-records/$record->id/$key.$ext", file_get_contents($file));
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

    public function view_image(Request $request)
    {
        // Something like (not sure)
        $image = Storage::get($request->url);

        return response()->make($image, 200, ['content-type' => 'image/jpg']);
    }
}
