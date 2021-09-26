<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EditController extends Controller
{
    public function index($id) {
        return view('pages.admin.edit', [
            'user' => $this->getUser($id)
        ]);
    }

    private function getUser($id) {
        return User::find($id);
    }
}
