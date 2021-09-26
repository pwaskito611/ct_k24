<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UpdatePasswordController extends Controller
{
    public function index(Request $request) {
        //validate user input 
        $this->validation($request);

        //update password
        $msg = $this->updatePassword($request);

        return \Redirect::back()->withErrors(['msg' => $msg]);
    }

    private function validation($request) {
        $request->validate([
            'current_password' => ['required', 'string', 'max:255'],
            'new_password' => ['min:6','required_with:confirm_password', 
                                'same:confirm_password'],
            'confirm_password' => ['min:6']
        ]);
    }

    private function updatePassword($request) {
        if(Hash::check($request->current_password, \Auth::user()->password) ) {
            $update = User::find(\Auth::user()->id);
            $update->password = Hash::make($request->new_password);
            $update->save();
            
            return 'password telah di perbarui';
        }

        return 'Password yang anda masukan salah';
    }
}
