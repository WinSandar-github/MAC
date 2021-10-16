<?php

namespace App\Http\Controllers\OfflineUserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfflineUserController extends Controller
{
    public function index(){
        return view("pages/offline_user/index");
    }
}
