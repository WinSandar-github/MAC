<?php

namespace App\Http\Controllers\ArticleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApprenticeAccountant;
use App\ApprenticeAccountantGov;
use App\Http\Requests\AppAccRequest;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

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

            $app_acc = ApprenticeAccountant::where('id', $id)->with('student_info')->first();

            return response()->json($app_acc, 200, $this->header, $this->options) ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500, $this->header, $this->options);
    }

    public function store(Request $request)
    {
        $acc_app = new ApprenticeAccountant();
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->apprentice_exp = $request->apprentice_exp == "undefined" ? null : $request->apprentice_exp ;

        // $exp_file = '';
        // if($request->apprentice_exp == 1 && $request->hasfile($request->apprentice_exp_file)){
        //     foreach($request->file('apprentice_exp_file') as $file){
        //         $name = date('Y-M-d') . "_" . $file->getClientOriginalName();
        //         $file->move(public_path() . '/storage/acc_app/', $name);
        //         $exp_file .= $name . ',' ;
        //     }
        // }

        if($request->hasfile('apprentice_exp_file'))
        {
            foreach($request->file('apprentice_exp_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $apprentice_exp_file[] = '/storage/student_info/'.$name;
            }        
        }else{
            $apprentice_exp_file = null;
        }

        $acc_app->apprentice_exp_file = json_encode($apprentice_exp_file) ;
        $acc_app->gov_staff = $request->gov_staff;
        $acc_app->gov_position = $request->gov_position;
        $acc_app->gov_joining_date = $request->gov_joining_date;
        $acc_app->request_papp = $request->request_papp;
        $acc_app->exam_pass_date = $request->exam_pass_date;
        $acc_app->exam_pass_batch = $request->exam_pass_batch;
        $acc_app->m_email = $request->m_email;
        $acc_app->ex_papp = $request->ex_papp;
        $acc_app->exp_start_date = $request->exp_start_date;
        $acc_app->exp_end_date = $request->exp_end_date;
        $acc_app->accept_policy = $request->accept_policy;
        $acc_app->resign_date = $request->resign_date ?? "N/A";
        $acc_app->resign_reason = $request->resign_reason ?? "N/A";
        $acc_app->recent_org = $request->recent_org ?? "N/A";
        $acc_app->resign_approve_file = $request->resign_approve_file ?? "N/A";
        $acc_app->know_policy = $request->know_policy;
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

    public function FilterArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('status',$request->status)->with('student_info')->get();

        return DataTables::of($article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showArticle($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('m_email', function ($infos){
                return $infos->student_info->m_email;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->status == 0){
                    return "PENDING";
                }else if($infos->status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->make(true);
    }

    public function approve($id)
    {
        $approve = ApprenticeAccountant::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id)
    {
        $reject = ApprenticeAccountant::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function saveGovArticle(Request $request)
    {
        $acc_app = new ApprenticeAccountantGov();
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->labor_registration_no = $request->labor_registration_no;

        if ($request->hasfile('labor_registration_attach')) {
            $file = $request->file('labor_registration_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $labor_registration_attach = '/storage/student_info/'.$name;
        }
        
        if ($request->hasfile('recommend_attach')) {
            $file = $request->file('recommend_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $recommend_attach = '/storage/student_info/'.$name;
        }

        if ($request->hasfile('police_attach')) {
            $file = $request->file('police_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $police_attach = '/storage/student_info/'.$name;
        }

        $acc_app->father_job = $request->father_job;
        $acc_app->father_address = $request->father_address;
        $acc_app->married = $request->married;
        $acc_app->married_name = $request->married_name;
        $acc_app->married_job = $request->married_job;
        $acc_app->home_address = $request->home_address;
        $acc_app->current_address = $request->current_address;
        $acc_app->address = $request->address;
        $acc_app->tempory_address = $request->tempory_address;
        $acc_app->m_email = $request->m_email;
        $acc_app->permanent_address = $request->permanent_address;
        $acc_app->labor_registration_attach = $labor_registration_attach;
        $acc_app->recommend_attach = $recommend_attach;
        $acc_app->police_attach = $police_attach;
        $acc_app->accept_policy = $request->accept_policy;
        // return $acc_app;
        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function showGovArticle($id)
    {
        if($id != ""){

            $app_acc = ApprenticeAccountantGov::where('id', $id)->with('student_info')->first();

            return response()->json($app_acc, 200, $this->header, $this->options) ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500, $this->header, $this->options);
    }

    public function FilterGovArticle(Request $request)
    {
        $article = ApprenticeAccountantGov::where('status',$request->status)->with('student_info')->get();

        return DataTables::of($article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showGovArticle($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('m_email', function ($infos){
                return $infos->student_info->m_email;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->status == 0){
                    return "PENDING";
                }else if($infos->status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->make(true);
    }

    public function approveGov($id)
    {
        $approve = ApprenticeAccountantGov::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectGov($id)
    {
        $reject = ApprenticeAccountantGov::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function saveResignArticle(Request $request)
    {
        $acc_app = new ApprenticeAccountant();
        $acc_app->student_info_id = $request->student_info_id;

        if ($request->hasfile('resign_approve_attach')) {
            $file = $request->file('resign_approve_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $resign_approve_attach = '/storage/student_info/'.$name;
        }

        $acc_app->resign_date = $request->resign_date;
        $acc_app->resign_reason = $request->resign_reason;
        $acc_app->recent_org = $request->recent_org;
        $acc_app->m_email = $request->m_email;
        $acc_app->resign_approve_file = $resign_approve_attach;
        $acc_app->know_policy = $request->know_policy;
        $acc_app->article_form_type = 0;
        $acc_app->gov_staff = 0;
        // return $acc_app;
        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function showResignArticle($id)
    {
        if($id != ""){

            $app_acc = ApprenticeAccountant::where('id', $id)->with('student_info')->first();

            return response()->json($app_acc, 200, $this->header, $this->options) ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500, $this->header, $this->options);
    }

    public function FilterResignArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('status',$request->status)->with('student_info')->get();

        return DataTables::of($article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showGovArticle($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('m_email', function ($infos){
                return $infos->student_info->m_email;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->status == 0){
                    return "PENDING";
                }else if($infos->status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->make(true);
    }

    public function approveResign($id)
    {
        $approve = ApprenticeAccountant::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectResign($id)
    {
        $reject = ApprenticeAccountant::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

}
