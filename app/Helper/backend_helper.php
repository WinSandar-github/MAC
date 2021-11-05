<?php
use App\CPAFF;
use App\PAPP;

function generateCpaffNo($id){
    $old = CPAFF::orderBy('cpaff_reg_no', 'desc')->first();
    // return $old->cpaff_reg_no;
    if($old->cpaff_reg_no == '' && $old->cpaff_reg_no == NULL){
        $reg_no = 1129;
    }else{
        $reg_no = $old->cpaff_reg_no +1;
    }
    $cpaff = CPAFF::find($id);
    $cpaff->cpaff_reg_no = $reg_no;
    $cpaff->reg_date     = date('Y-m-d');
    $cpaff->save();
}

function generatePappNo($id){
    $old = Papp::orderBy('papp_reg_no', 'desc')->first();
        // return $old->cpaff_reg_no;
    if($old->papp_reg_no == '' && $old->papp_reg_no == NULL){
        $reg_no = 1445;
    }else{
        $reg_no = $old->papp_reg_no +1;
    }
    $papp = PAPP::find($id);
    $papp->papp_reg_no   = $reg_no;
    $papp->papp_reg_date = date('Y-m-d');
    $papp->save();
}