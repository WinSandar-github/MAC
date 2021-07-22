<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CPAFF;

class CPAFFController extends Controller
{
    public function index()
    {
        $cpa_ff = CPAFF::with('student_info')->get();
        return response()->json([
            'data' => $cpa_ff
        ],200);
    }
    public function store(Request $request)
    {
        if ($request->hasfile('cpa')) {
            $file = $request->file('cpa');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa = $name;
        }
        else{
            $cpa=null;
        }

        if ($request->hasfile('ra')) {
            $file = $request->file('ra');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $ra = $name;
        }
        else{
            $ra=null;
        }

        if($request->hasfile('foreign_degree'))
        {
            foreach($request->file('foreign_degree') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $foreign_degree[] = $name;
            }        
        }else{
            $foreign_degree = null;
        }

        // if ($request->hasfile('foreign_degree')) {
        //     $file = $request->file('foreign_degree');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $foreign_degree = $name;
        // }
        // else{
        //     $foreign_degree=null;
        // }

        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = $name;
        }
        else{
            $cpa_certificate="";
        }

        if ($request->hasfile('mpa_mem_card')) {
            $file = $request->file('mpa_mem_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card = $name;
        }else{
            $mpa_mem_card="";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $nrc_front= $name;
        }else{
            $nrc_front="";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $nrc_back= $name;
        }else{
            $nrc_back="";
        }

        if ($request->hasfile('cpd_record')) {
            $file = $request->file('cpd_record');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpd_record = $name;
        }else{
            $cpd_record="";
        }

        if ($request->hasfile('passport_image')) {
            $file = $request->file('passport_image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $passport_image = $name;
        }else{
            $passport_image="";
        }

        $cpa_ff  = new CPAFF();
        $cpa_ff->student_info_id  =   $request->student_info_id;
        $cpa_ff->cpa              =   $cpa;
        $cpa_ff->ra               =   $ra;
        $cpa_ff->foreign_degree   =   json_encode($foreign_degree);
        // $cpa_ff->foreign_degree   =   $foreign_degree;
        $cpa_ff->cpa_part_2       =   $request->cpa_part_2;
        $cpa_ff->qt_pass          =   $request->qt_pass;
        $cpa_ff->cpa_certificate  =   $cpa_certificate;
        $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        $cpa_ff->nrc_front        =   $nrc_front;
        $cpa_ff->nrc_back         =   $nrc_back;
        $cpa_ff->cpd_record       =   $cpd_record;
        $cpa_ff->passport_image   =   $passport_image;
        $cpa_ff->status           =  0;
        $cpa_ff->save();

    return response()->json([
        'message' => "Insert Successfully"
    ],200);
    }

    public function show($id)
    {
        $cpaff = CPAFF::where('id',$id)->with('student_info')->get();
        return response()->json([
            'data'  => $cpaff
        ]);
        return $cpa_ff;

        
    }

    // public function update(Request $request, $id)
    // {
    //     $cpa_ff = CPAFF::find($id);
    //     $cpa_ff->student_info_id  =   $request->student_info_id;
    //     $cpa_ff->cpa              =   $cpa;
    //     $cpa_ff->ra               =   $ra;
    //     $cpa_ff->foreign_degree   =   json_encode($foreign_degree);
    //     // $cpa_ff->foreign_degree   =   $foreign_degree;
    //     $cpa_ff->cpa_part_2       =   $request->cpa_part_2;
    //     $cpa_ff->qt_pass          =   $request->qt_pass;
    //     $cpa_ff->cpa_certificate  =   $cpa_certificate;
    //     $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
    //     $cpa_ff->nrc_front        =   $nrc_front;
    //     $cpa_ff->nrc_back         =   $nrc_back;
    //     $cpa_ff->cpd_record       =   $cpd_record;
    //     $cpa_ff->passport_image   =   $passport_image;
    //     $cpa_ff->save();
    //     return response()->json([
    //         'message' => "Update Successfully"
    //     ],200);

    //  }

    // public function destroy($id)
    // {
    //     $cpa_ff = CPAFF::find($id);
    //     $cpa_ff->delete();

    //     return response()->json([
    //         'message' => "Delete Successfully"
    //     ],200);   
    // }
}


