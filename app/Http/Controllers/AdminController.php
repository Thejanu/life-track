<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\News;
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
                'role' => 'Admin',
                'password' => $request->password,
            ]);

            session()->flash('message', 'User added successfully.');


            return redirect()->back();
        }


        return view('admins.handle', [
            'users' => User::where("role", "Admin")->where('id', '!=', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function deleteUser($id)
    {

        User::find($id)->delete();

        session()->flash('message', 'User deleted successfully.');


        return redirect()->back();
    }

    public function viewNews($id)
    {

        $news = News::find($id);

        return view('news.view', [
            'item' => $news,
        ]);
    }

    public function addNews(Request $request)
    {

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'title' => 'required|max:255',
                'link' => 'required|max:255',
                'summary' => 'required',
                'details' => 'required',
            ]);


            $news = new News();

            $news->title = $request->title;
            $news->link = $request->link;
            $news->summary = $request->summary;
            $news->details = $request->details;

            $news->save();

            session()->flash('message', 'News item added.');


            return redirect("/dashboard");
        }

        return view('news.add');
    }
}
