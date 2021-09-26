<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDataController extends Controller
{
    public function index() {
        return response()->json($this->getUser(), 200);
    }

    private function getUser() {
        $users = User::select('name', 'username', 'email', 
        'gender', 'no_ktp', 'phone_number', 'date_of_birth', 'photo_path', 'is_admin')
        ->get();

        return $users;
    }


}
