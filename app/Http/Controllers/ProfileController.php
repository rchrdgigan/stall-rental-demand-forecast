<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ProfileController extends Controller
{
 
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return back()->with('success','Profile successfully updated!');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return redirect()->route('profile')->with("error", "Old Password Doesn't match!");
        }

        if($request->new_password != $request->new_password_confirmation){
            return redirect()->route('profile')->with("error", "Confirmation Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile')->with("success", "Password changed successfully!");
    }
}
