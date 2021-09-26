<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        if(\Auth::check()) {
            return Redirect('/admin/dashboard');
        }

        return view('pages.admin.login');
    }
}
