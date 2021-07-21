<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DA1ExamCardController extends Controller
{
    //
    public function index(){
        return view('pages.exam_cards.da1_examcard');
    }
}