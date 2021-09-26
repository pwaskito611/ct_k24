<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class UpdateAccountController extends Controller
{
    public function index(Request $request) {
        //validate user input
        $this->validation($request);

        //update user data
        $this->update($request);

       return \Redirect::back();
    }

    private function validation($request) {
        $checkEmail = null;
        $checkUsername = null;

        if($request->email !== \Auth::user()->email) {
            //check if new email is available
            $checkEmail = User::where('email', $request->email)->first();
        }

        if($checkEmail === null){
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
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
    }

    private function update($request) {

        $update = User::find(\Auth::user()->id);
        $update->email = $request->email;
        $update->name = $request->name;
        $update->gender = $request->gender;
        $update->no_ktp = $request->no_ktp;
        $update->date_of_birth = $request->date_of_birth;
        $update->phone_number = $request->phone_number;

        if($request->image !== null) {
            $update->photo_path = $this->storeImage($request->file('image'));          
        }

        $update->save();
    }

    private function storeImage($image) {
        return $path = $image->store('public/assets');
    }
}
