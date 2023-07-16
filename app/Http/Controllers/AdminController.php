<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view(('admin.profile'), compact('user'));
    }


    public function editProfile()
    {
        $id = Auth::user()->id;
        $edit = User::find($id);

        return view(('admin.profile_edit'), compact('edit'));
    }

    public function storeProfile(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin/img'), $filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        return redirect()->route('admin.profile');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
