<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamCardsController extends Controller
{
    //
    public function DA1_ExamCard(){
        return view('pages.exam_cards.da1_examcard');
    }

    public function CPA1_ExamCard(){
        return view('pages.exam_cards.cpa1_examcard');
    }
}