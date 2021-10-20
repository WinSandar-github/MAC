<?php

namespace App\Http\Controllers\OfflineUserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfflineUserController extends Controller
{
    public function index(){ 
        return view("pages/offline_user/index"); 
    } 
    public function DetailDA_CPAOfflineStudent(){ 
        return view("pages/offline_user/da_cpa_offline_detail"); 
    }
}
