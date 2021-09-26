<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request) {
        //validate user input
        $this->validation($request);

        $isSuccess = $this->auth($request);

        if($isSuccess) {
            return \Redirect('/admin/dashboard');
        }

        return \Redirect::back()->withErrors(['msg' => 'your username or password is wrong']);
    }

    private function validation($request){
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
    }

    private function auth($request) {
        $auth = User::where('username', $request->username)->first();

        if($auth !== null) {

            if (Hash::check($request->password, $auth->password) && $auth->is_admin == 1 ) {
                \Auth::login($auth);

                return true;
            }

            return false;
        }

        return false;
    }
}
