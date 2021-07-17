<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Papp;

class PAPPController extends Controller
{
    //
    public function index()
    {
        $papp = Papp::all();
        return response()->json([
            'data' => $papp
        ],200);
    }
    public function store(Request $request)
    {
        $papp  = new Papp();
        $papp->student_id = $request->student_id;
        $papp->cpa =   $request->cpa;
        $papp->ra =   $request->ra;
        $papp->foreign_degree =   $request->foreign_degree;
        $papp->papp_date =   $request->papp_date;
        $papp->use_firm =   $request->use_firm;
        $papp->firm_name =   $request->firm_name;
        $papp->firm_type =   $request->firm_type;
        $papp->firm_step =   $request->firm_step;
        $papp->staff_firm_name =   $request->staff_firm_name;
        $papp->cpa_ff_recommendation =   $request->cpa_ff_recommendation;
        $papp->recommendation_183 =   $request->recommendation_183;
        $papp->not_fulltime_recommendation =   $request->not_fulltime_recommendation;
        $papp->work_in_myanmar_confession =   $request->work_in_myanmar_confession;
        $papp->rule_confession =   $request->rule_confession;
        $papp->cpd_record =   $request->cpd_record;
        $papp->tax_free_recommendation =   $request->tax_free_recommendation;
             $papp->save();
 
            return response()->json([
                'message' => "Insert Successfully"
            ],200);
    }
}
