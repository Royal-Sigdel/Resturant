<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\user;

class Usercontroller extends Controller
 
{ public function profile()
    {
        return view('profile');
    }
    public function update_avatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('avatar'))
        {
        User::update_avatar($request->avatar);
        }
        return redirect()->route('home')->with('success','You have successfully upload image.');
    }
}
