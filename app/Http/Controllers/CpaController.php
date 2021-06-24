<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EducationLevel;
class CpaController extends Controller
{
    public function cpa_ff_registration(){
           return view('pages.cpa.cpa_ff_registration');
    }

    public function cpa_ff_registration_form1(){
       $education_level = EducationLevel::all();  
       return view('pages.cpa.cpa_ff_register_form1',compact('education_level'));
  }
}
