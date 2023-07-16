<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }



    public function changePassword()
    {
        return view('admin.change_password');
    }

    public function updatePassword (Request $request)
    {
        $validateData = $request->validate([
            'oldpass' => 'required',
            'newPass' => 'required',
            'confirmPass' => 'required|same:newPass',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldPass, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->newPass);
            $user->save();

            session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        } else {
            session()->flash('message', 'Password is not matched');
            return redirect()->back();
        }
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
