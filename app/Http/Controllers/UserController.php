<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Adldap\AdldapInterface;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    // public function index(AdldapInterface $ldap)
    // {
    //     return view('users.index', [
    //         'users' => $ldap->search()->users()->paginate(15)
    //     ]);
    // }
}
