<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Adldap\Laravel\Facades\Adldap;
use Adldap\Models\User;

class LdapLoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function index(Request $request) {
        $search = Adldap::search()->where('cn', '=', 'Nikola Tesla')->get();

        return $search;
    }
}
