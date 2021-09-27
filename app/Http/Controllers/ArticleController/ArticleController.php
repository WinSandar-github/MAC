<?php

namespace App\Http\Controllers\ArticleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApprenticeAccountant;
use App\Http\Requests\AppAccRequest;

class ArticleController extends Controller
{

    protected $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    );

    protected $options = JSON_UNESCAPED_UNICODE;

    public function index()
    {
        return "index";
    }

    public function show($id)
    {
        if($id != ""){

            $app_acc = ApprenticeAccountant::where('id', $id)->first();

            return response()->json($app_acc, 200, $this->header, $this->options) ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500, $this->header, $this->options);
    }

    public function store(AppAccRequest $request)
    {
        $acc_app = new ApprenticeAccountant();
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->apprentice_exp = $request->apprentice_exp;

        $exp_file = '';
        if($request->apprentice_exp == 1 && $request->hasfile($request->apprentice_exp_file)){
            foreach($request->file('apprentice_exp_file') as $file){
                $name = date('Y-M-d') . "_" . $file->getClientOriginalName();
                $file->move(public_path() . '/storage/acc_app/', $name);
                $exp_file .= $name . ',' ;
            }
        }

        $acc_app->apprentice_exp_file = $exp_file ;
        $acc_app->gov_staff = $request->gov_staff;
        $acc_app->gov_position = $request->gov_position;
        $acc_app->gov_joining_date = $request->gov_joining_date;
        $acc_app->request_papp = $request->request_papp;
        $acc_app->exam_pass_date = $request->exam_pass_date;
        $acc_app->exam_pass_batch = $request->exam_pass_batch;
        $acc_app->ex_papp = $request->ex_papp;
        $acc_app->exp_start_date = $request->apprentice_exp;
        $acc_app->exp_end_date = $request->exp_end_date;
        $acc_app->accept_policy = $request->accept_policy;
        $acc_app->resign_date = $request->resign_date ?? "N/A";
        $acc_app->resign_reason = $request->resign_reason ?? "N/A";
        $acc_app->recent_org = $request->recent_org ?? "N/A";
        $acc_app->resign_approve_file = $request->resign_approve_file ?? "N/A";
        $acc_app->know_policy = $request->know_policy ?? "N/A";
        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function update()
    {
        return "update";
    }

    public function destory()
    {
        return "destory";
    }
}
