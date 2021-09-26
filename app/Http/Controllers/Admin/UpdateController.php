<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class UpdateController extends Controller
{

    private $user;

    public function index(Request $request) {
        //validate user input
        $this->validation($request);

        //update user data
        $this->update($request);

        return \Redirect::back()->withErrors(['msg' => 'pembuaruan berhasil!']);
    }

    private function validation($request) {
        $checkEmail = null;
        $checkUsername = null;

        $this->user = User::find($request->id);

        if($request->email !== $this->user->email) {
            //check if new email is available
            $checkEmail = User::where('email', $request->email)->first();
        }

        if($request->username !== $this->user->username) {
            //check new if username is available
            $checkUsername = User::where('email', $request->username)->first();
        }

        if($checkEmail === null && $checkUsername === null){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'gender' => ['required', 'string', 'in:l,p'],
                'no_ktp' => ['required', 'string'],
                'date_of_birth' => ['required', 'date'],
                'phone_number' => ['required', 'string', 'min:12', 'max:20'],
                'image' => ['image', 'max:1024']
            ]);
        }else{//redirect user back because new email or new username has been used
            $request->validate([
                'username' => ['required', 'string', 'max:30', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
    }

    private function update($request) {

        
        $this->user->email = $request->email;
        $this->user->name = $request->name;
        $this->user->gender = $request->gender;
        $this->user->no_ktp = $request->no_ktp;
        $this->user->date_of_birth = $request->date_of_birth;
        $this->user->phone_number = $request->phone_number;

        if($request->image !== null) {
            $this->user->photo_path = $this->storeImage($request->file('image'));          
        }

        $this->user->save();
    }

    private function storeImage($image) {
        return $path = $image->store('public/assets');
    }
}
