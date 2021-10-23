<?php

namespace App\Http\Controllers\ArticleController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ApprenticeAccountant;
use App\ApprenticeAccountantGov;
use App\leave_request;
use App\Http\Requests\AppAccRequest;
use App\Invoice;
use App\StudentInfo;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;

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

            $app_acc = ApprenticeAccountant::where('id', $id)->with('student_info','mentor')->first();

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

        if ($request->hasfile('request_papp_attach')) {
            $file = $request->file('request_papp_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $request_papp_attach = '/storage/student_info/'.$name;
        }else{
            $request_papp_attach = "";
        }

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

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        $acc_app->apprentice_exp_file = json_encode($apprentice_exp_file) ;
        $acc_app->gov_staff = $request->gov_staff;
        $acc_app->gov_position = $request->gov_position;
        $acc_app->gov_joining_date = $request->gov_joining_date;
        $acc_app->request_papp = $request->request_papp;
        $acc_app->mentor_id = $request->mentor_id;
        $acc_app->request_papp_attach = $request_papp_attach;
        $acc_app->exam_pass_date = $request->exam_pass_date;
        $acc_app->exam_pass_batch = $request->exam_pass_batch;
        $acc_app->current_address = $request->current_address;
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
        
        //invoice
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;
        
        $invoice->invoiceNo = $request->article_form_type;
        $invoice->productDesc     = 'Registration Fee, Article Registration Form';
        $invoice->amount          = '5000';
        $invoice->status          = 0;
        $invoice->save();

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
        $article = ApprenticeAccountant::where('status',$request->status)->where('article_form_type' ,'<>', 'resign')->with('student_info')->get();

        $result_article = [];
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time > $today){
                    array_push($result_article , $article[$i]);
                }
            }else{
                array_push($result_article , $article[$i]);
            }
        }

        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showArticle($infos->id)'>
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
            ->addColumn('registration_fee', function ($infos){
                return $infos->registration_fee == null ? "-" : $infos->registration_fee;
            })
            ->addColumn('form_type', function ($infos){
                if($infos->article_form_type == 'c12'){
                    return "CPA I,II";
                }else if($infos->article_form_type == 'c2_pass_1yr'){
                    return "CPA II pass 1 yr";
                }else if($infos->article_form_type == 'c2_pass_3yr'){
                    return "CPA II pass 3 yr";
                }else if($infos->article_form_type == 'qt_firm'){
                    return "QT pass";
                }else if($infos->article_form_type == 'c2_pass_renew'){
                    return "CPA II Pass Renew";
                }else if($infos->article_form_type == 'c12_renew'){
                    return "CPA I,II Renew";
                }
            });
            $datatable = $datatable->addColumn('contract_start_date', function ($infos){
                if($infos->status == 0){
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm' disabled onclick='showContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                    </div>";
                }else if($infos->status == 1){
                    if($infos->contract_start_date == null && $infos->contract_end_date == null){
                        if($infos->mentor_attach_file == null){
                            return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showContractDate($infos)'>
                                    <li class='fa fa-calendar fa-sm'></li>
                                </button>
                                <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateContractDate($infos)'>
                                    <li class='fa fa-pencil' fa-sm'></li>
                                </button>
                            </div>";
                        }else{
                            return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showContractDate($infos)'>
                                    <li class='fa fa-calendar fa-sm'></li>
                                </button>
                                <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateContractDate($infos)'>
                                    <li class='fa fa-pencil' fa-sm'></li>
                                </button>
                            </div>";
                        }
                    }else if($infos->done_status == 0){
                        return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showContractDate($infos)'>
                                <li class='fa fa-calendar fa-sm'></li>
                            </button>
                            <button type='button' class='btn btn-warning btn-sm p' onclick='updateContractDate($infos)'>
                                <li class='fa fa-pencil' fa-sm'></li>
                            </button>
                        </div>";
                    }else{
                        return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showContractDate($infos)'>
                                <li class='fa fa-calendar fa-sm'></li>
                            </button>
                            <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateContractDate($infos)'>
                                <li class='fa fa-pencil' fa-sm'></li>
                            </button>
                        </div>";
                    }
                }else{
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm' disabled onclick='showContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                    </div>";
                }
            });
            $datatable = $datatable->rawColumns(['contract_start_date', 'status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function saveContractDate(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        $approve->contract_start_date = $request->contract_start_date;
        $approve->contract_end_date = $request->contract_end_date;
        //$approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveDoneForm(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        if ($request->hasfile('done_form')) {
            $file = $request->file('done_form');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $done_form = '/storage/student_info/'.$name;
        }
        $approve->done_form_attach = $done_form;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function filterDoneArticle(Request $request)
    {
        if($request->status == 1){
            $article = ApprenticeAccountant::where('done_status',$request->status)->where('article_form_type' ,'<>', 'resign')->where('article_form_type' ,'<>', 'c2_pass_3yr')->where('article_form_type' ,'<>', 'c2_pass_1yr')->with('student_info')->get();
        }else{
            $article = ApprenticeAccountant::where('done_status',$request->status)->where('article_form_type' ,'<>', 'resign')->where('status' , '=' , 1)->with('student_info')->get();
        }
        
        $result_article = [];
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time <= $today){
                    array_push($result_article , $article[$i]);
                }
            }
        }

        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showArticle($infos->id)'>
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
                if($infos->done_status == 0){
                    return "PENDING";
                }else if($infos->done_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->addColumn('form_type', function ($infos){
                if($infos->article_form_type == 'c12'){
                    return "CPA I,II";
                }else if($infos->article_form_type == 'c2_pass_1yr'){
                    return "CPA II pass 1 yr";
                }else if($infos->article_form_type == 'c2_pass_3yr'){
                    return "CPA II pass 3 yr";
                }else if($infos->article_form_type == 'qt_firm'){
                    return "QT pass";
                }else if($infos->article_form_type == 'c2_pass_renew'){
                    return "CPA II Pass Renew";
                }else if($infos->article_form_type == 'c12_renew'){
                    return "CPA I,II Renew";
                }
            })
            ->setRowClass(function ($infos) {
                return $infos->done_form_attach != null && $infos->done_status != 1 ? 'bg-success' : 'bg-light';
            });
            // $datatable = $datatable->addColumn('check_end_date', function ($infos){
            //     return "<div class='btn-group'>
            //                     <button type='button' class='btn btn-warning btn-sm' onclick='checkEndArticle($infos)'>
            //                         <li class='fa fa-pencil fa-sm'></li>
            //                     </button>
            //                 </div>";
            // });
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
            return $datatable;
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

    public function approveDone($id)
    {
        $approve = ApprenticeAccountant::find($id);

        $firm = ApprenticeAccountant::where('student_info_id',$approve->student_info_id)->get();

        $gov = ApprenticeAccountantGov::where('student_info_id',$approve->student_info_id)->get();

        if(count($gov) == 0){
            $start_article = Carbon::parse($firm[0]->contract_start_date);
        }else{
            $start_article = Carbon::parse($gov[0]->contract_start_date);
        }
        $end_article = Carbon::parse($firm[count($firm) - 1]->contract_end_date);

        $diff_days = $end_article->diffInDays($start_article);

        if($diff_days > 1095){  // 1095 = 3yrs
            if(count($gov) != 0){
                $gov[0]->done_status = 3;
                $gov[0]->save();
            }
            for($i = 0; $i<count($firm); $i++){
                $firm[$i]->done_status = 3;
                $firm[$i]->save();
            }
        }else{
            $approve->done_status = 1;
            $approve->save();
        }
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectDone($id)
    {
        $reject = ApprenticeAccountant::find($id);
        $reject->done_status = 2;
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

        // if ($request->hasfile('labor_registration_attach')) {
        //     $file = $request->file('labor_registration_attach');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $labor_registration_attach = '/storage/student_info/'.$name;
        // }

        if($request->hasfile('labor_registration_attach'))
        {
            foreach($request->file('labor_registration_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $labor_registration_attach[] = '/storage/student_info/'.$name;
            }        
        }else{
            $labor_registration_attach = null;
        }

        if($request->hasfile('recommend_attach'))
        {
            foreach($request->file('recommend_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $recommend_attach[] = '/storage/student_info/'.$name;
            }        
        }else{
            $recommend_attach = null;
        }

        if($request->hasfile('police_attach'))
        {
            foreach($request->file('police_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $police_attach[] = '/storage/student_info/'.$name;
            }        
        }else{
            $police_attach = null;
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }
        
        // if ($request->hasfile('recommend_attach')) {
        //     $file = $request->file('recommend_attach');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $recommend_attach = '/storage/student_info/'.$name;
        // }

        // if ($request->hasfile('police_attach')) {
        //     $file = $request->file('police_attach');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $police_attach = '/storage/student_info/'.$name;
        // }

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
        $acc_app->labor_registration_attach = json_encode($labor_registration_attach) ;
        $acc_app->recommend_attach = json_encode($recommend_attach);
        $acc_app->police_attach = json_encode($police_attach);
        $acc_app->accept_policy = $request->accept_policy;
        // return $acc_app;

        //invoice
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;
        
        $invoice->invoiceNo = "gov";
        $invoice->productDesc     = 'Registration Fee, Article Registration Form';
        $invoice->amount          = '5000';
        $invoice->status          = 0;
        $invoice->save();

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
        $result_article = [];
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time > $today){
                    array_push($result_article , $article[$i]);
                }
            }else{
                array_push($result_article , $article[$i]);
            }
        }
        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showGovArticle($infos->id)'>
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
            ->addColumn('registration_fee', function ($infos){
                return $infos->registration_fee == null ? "-" : $infos->registration_fee;;
            })
            ->addColumn('form_type', function ($infos){
                return "Gov Form";
            });
        $datatable = $datatable->addColumn('contract_start_date', function ($infos){
            if($infos->status == 0){
                return "<div class='btn-group'>
                    <button type='button' class='btn btn-primary btn-sm' disabled onclick='showGovContractDate($infos)'>
                        <li class='fa fa-calendar fa-sm'></li>
                    </button>
                </div>";
            }else if($infos->status == 1){
                if($infos->contract_start_date == null && $infos->contract_end_date == null){
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showGovContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                        <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateGovContractDate($infos)'>
                            <li class='fa fa-pencil' fa-sm'></li>
                        </button>
                    </div>";
                }else if($infos->done_status == 0){
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showGovContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                        <button type='button' class='btn btn-warning btn-sm p' onclick='updateGovContractDate($infos)'>
                            <li class='fa fa-pencil' fa-sm'></li>
                        </button>
                    </div>";
                }else{
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showGovContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                        <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateGovContractDate($infos)'>
                            <li class='fa fa-pencil' fa-sm'></li>
                        </button>
                    </div>";
                }
            }else{
                return "<div class='btn-group'>
                    <button type='button' class='btn btn-primary btn-sm' disabled onclick='showGovContractDate($infos)'>
                        <li class='fa fa-calendar fa-sm'></li>
                    </button>
                </div>";
            }
        });
        $datatable = $datatable->rawColumns(['contract_start_date', 'status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
        return $datatable;
    }

    public function saveGovContractDate(Request $request)
    {
        $approve = ApprenticeAccountantGov::find($request->id);
        $approve->contract_start_date = $request->contract_start_date;
        $approve->contract_end_date = $request->contract_end_date;
        //$approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveGovDoneForm(Request $request)
    {
        $approve = ApprenticeAccountantGov::find($request->id);
        if ($request->hasfile('done_form')) {
            $file = $request->file('done_form');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $done_form = '/storage/student_info/'.$name;
        }
        $approve->done_form_attach = $done_form;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function filterGovDoneArticle(Request $request)
    {
        if($request->status == 1){
            // $article = ApprenticeAccountant::join('ApprenticeAccountantGov')
            //             ->join('student_info_id', '=', 'ApprenticeAccountantGov.student_info_id')
            //             ->where('done_status',$request->status)->with('student_info')->get();
            // $data = DB::table('apprentice_accountants')
            //     ->join('apprentice_accountants_gov', 'apprentice_accountants.student_info_id', '=', 'apprentice_accountants_gov.student_info_id')
            //     ->where('apprentice_accountants.done_status','=', 1)
            //     ->where('apprentice_accountants_gov.done_status','=', 1)
            //     ->get();

            $article = ApprenticeAccountantGov::where('done_status',$request->status)->with('student_info')->get();
        }else{
            $article = ApprenticeAccountantGov::where('done_status',$request->status)->where('status' , '=' , 1)->with('student_info')->get();
        }

        $result_article = [];
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time <= $today){
                    array_push($result_article , $article[$i]);
                }
            }
        }
        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showGovArticle($infos->id)'>
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
                if($infos->done_status == 0){
                    return "PENDING";
                }else if($infos->done_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->addColumn('form_type', function ($infos){
                return "Gov Form";
            })
            ->setRowClass(function ($infos) {
                return $infos->done_form_attach != null && $infos->done_status != 1 ? 'bg-success' : 'bg-light';
            });
        // $datatable = $datatable->addColumn('check_end_date', function ($infos){
        //     return "<div class='btn-group'>
        //                     <button type='button' class='btn btn-warning btn-sm' onclick='checkEndGovArticle($infos)'>
        //                         <li class='fa fa-pencil fa-sm'></li>
        //                     </button>
        //                 </div>";
        // });
        $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
        return $datatable;
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

    public function approveDoneGov($id)
    {
        $approve = ApprenticeAccountantGov::find($id);
        $approve->done_status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectDoneGov($id)
    {
        $reject = ApprenticeAccountantGov::find($id);
        $reject->done_status = 2;
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
        }else{
            $resign_approve_attach = "";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        $acc_app->resign_date = $request->resign_date;
        $acc_app->resign_reason = $request->resign_reason;
        $acc_app->recent_org = $request->recent_org;
        $acc_app->m_email = $request->m_email;
        $acc_app->resign_approve_file = $resign_approve_attach;
        $acc_app->know_policy = $request->know_policy;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->gov_staff = 0;

        //invoice
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;
        
        $invoice->invoiceNo = $request->article_form_type;
        $invoice->productDesc     = 'Resign Fee, Article Resign Form';
        $invoice->amount          = '300000';
        $invoice->status          = 0;
        $invoice->save();

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
        $article = ApprenticeAccountant::where('resign_status',$request->status)->where('done_status',0)->where('article_form_type', '=' , 'resign')->with('student_info')->get();

        $datatable = DataTables::of($article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showResignArticle($infos->id)'>
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
            ->addColumn('registration_fee', function ($infos){
                return $infos->registration_fee == null ? "-" : $infos->registration_fee;
            })
            ->addColumn('status', function ($infos){
                if($infos->resign_status == 0){
                    return "PENDING";
                }else if($infos->resign_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            });
            
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function approveResign($id)
    {
        $approve = ApprenticeAccountant::find($id);
        $approve->resign_status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectResign($id)
    {
        $reject = ApprenticeAccountant::find($id);
        $reject->resign_status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function filterDone3yrsArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('done_status',3)->with('student_info')->get();
        $article_gov = ApprenticeAccountantGov::where('done_status',3)->with('student_info')->get();

        $result_article = [];
        for($i=0;$i<count($article);$i++){
            array_push($result_article , $article[$i]);
        }
        for($i=0;$i<count($article_gov);$i++){
            array_push($result_article , $article_gov[$i]);
        }

        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showArticle($infos->id)'>
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
                if($infos->done_status == 0){
                    return "PENDING";
                }else if($infos->done_status == 1){
                    return "APPROVED";
                }else if($infos->done_status == 2){
                    return "REJECTED";
                }else{
                    return "Done";
                }
            })
            ->addColumn('form_type', function ($infos){
                if($infos->article_form_type == 'c12'){
                    return "CPA I,II";
                }else if($infos->article_form_type == 'c2_pass_1yr'){
                    return "CPA II pass 1 yr";
                }else if($infos->article_form_type == 'c2_pass_3yr'){
                    return "CPA II pass 3 yr";
                }else if($infos->article_form_type == 'qt_firm'){
                    return "QT pass";
                }else if($infos->article_form_type == 'c2_pass_renew'){
                    return "CPA II Pass Renew";
                }else if($infos->article_form_type == 'c12_renew'){
                    return "CPA I,II Renew";
                }else if($infos->article_form_type == 'resign'){
                    return "Resign";
                }
            });
            // ->setRowClass(function ($infos) {
            //     return $infos->done_form_attach != null ? 'bg-success' : 'bg-warning';
            // });
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function filterDoneResignArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('done_status',1)->where('article_form_type' ,'resign')->with('student_info')->get();

        $datatable = DataTables::of($article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showResignArticle($infos->id)'>
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
            ->addColumn('registration_fee', function ($infos){
                return $infos->registration_fee == null ? "-" : $infos->registration_fee;
            })
            ->addColumn('status', function ($infos){
                if($infos->resign_status == 0){
                    return "PENDING";
                }else if($infos->resign_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            });
            // ->setRowClass(function ($infos) {
            //     return $infos->done_form_attach != null ? 'bg-success' : 'bg-warning';
            // });
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function saveRegistrationFee(Request $request)
    {
        $article = ApprenticeAccountant::find($request->id);
        $article->registration_fee = 'yes';
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveGovRegistrationFee(Request $request)
    {
        $article = ApprenticeAccountantGov::find($request->id);
        $article->registration_fee = 'yes';
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveAttachFile(Request $request)
    {
        $article = ApprenticeAccountant::find($request->id);

        // if ($request->hasfile('attach_file')) {
        //     $file = $request->file('attach_file');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $attach_file = '/storage/student_info/'.$name;
        // }

        if($request->hasfile('attach_file'))
        {
            foreach($request->file('attach_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $attach_file[] = '/storage/student_info/'.$name;
            }        
        }else{
            $attach_file = null;
        }

        $article->mentor_attach_file = $attach_file;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveRenewArticle(Request $request)
    {
        $acc_app = new ApprenticeAccountant();
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->apprentice_exp = $request->apprentice_exp == "undefined" ? null : $request->apprentice_exp ;

        if ($request->hasfile('request_papp_attach')) {
            $file = $request->file('request_papp_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $request_papp_attach = '/storage/student_info/'.$name;
        }else{
            $request_papp_attach = "";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        // $acc_app->gov_staff = $request->gov_staff;
        // $acc_app->gov_position = $request->gov_position;
        // $acc_app->gov_joining_date = $request->gov_joining_date;
        $acc_app->request_papp = $request->request_papp;
        $acc_app->mentor_id = $request->mentor_id;
        $acc_app->request_papp_attach = $request_papp_attach;
        $acc_app->current_address = $request->current_address;
        $acc_app->m_email = $request->m_email;
        $acc_app->ex_papp = $request->ex_papp;
        $acc_app->exp_start_date = $request->exp_start_date;
        $acc_app->exp_end_date = $request->exp_end_date;
        $acc_app->accept_policy = $request->accept_policy;

        //invoice
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;
        
        $invoice->invoiceNo = $request->article_form_type;
        $invoice->productDesc     = 'Registration Fee, Article Renew Form';
        $invoice->amount          = '5000';
        $invoice->status          = 0;
        $invoice->save();

        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function getResignEndDate($student_info_id)
    {
        $article = ApprenticeAccountant::where('student_info_id', $student_info_id)->with('student_info')->get();
        return $article;
    }

    public function saveLeaveRequest(Request $request)
    {
        if($request->form_name == "gov"){
            $approve = ApprenticeAccountantGov::find($request->id);
            $form_type = "gov";
        }else{
            $approve = ApprenticeAccountant::find($request->id);
            $form_type = $approve->article_form_type;
        }
        
        $leave_request = new leave_request();
        $leave_request->student_info_id = $approve->student_info_id;
        $leave_request->form_type = $form_type;
        $leave_request->start_date = $request->start_date;
        $leave_request->end_date = $request->end_date;
        $leave_request->total_leave = $request->total_date;
        $leave_request->remark = $request->remark;
        if($leave_request->save()){
            return response()->json(['message' => 'Create Leave Request Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function getLeaveRequest(Request $request)
    {
        if($request->form_name == 'gov'){
            $approve = ApprenticeAccountantGov::find($request->id);
            $form_type = 'gov';
        }else{
            $approve = ApprenticeAccountant::find($request->id);
            $form_type = $approve->article_form_type;
        }
        $data = leave_request::where('student_info_id',$approve->student_info_id)->where('form_type',$form_type)->get();
        return $data;
    }

    public function getUpdateLeaveRequest($id)
    {
        $result = leave_request::find($id);
        return $result;
    }

    public function updateLeaveRequest(Request $request)
    {
        $leave_request = leave_request::find($request->id);
        $leave_request->start_date = $request->start_date;
        $leave_request->end_date = $request->end_date;
        $leave_request->total_leave = $request->total_date;
        $leave_request->remark = $request->remark;
        if($leave_request->save()){
            return response()->json(['message' => 'Create Leave Request Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function getArticleList($id)
    {
        $article = ApprenticeAccountant::where('mentor_id', $id)->with('student_info')->get();
        return $article;
    }

    public function saveContractEndDate(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        $approve->contract_end_date = $request->contract_end_date;

        $leave_request = leave_request::where('student_info_id',$request->student_info_id)->where('form_type',$request->article_form_type)->get();
        for($i = 0 ; $i < count($leave_request) ; $i++){
            $leave_request[$i]->status = 1;
            $leave_request[$i]->save();
        }
        
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveGovContractEndDate(Request $request)
    {
        $approve = ApprenticeAccountantGov::find($request->id);
        $approve->contract_end_date = $request->contract_gov_end_date;
        
        $leave_request = leave_request::where('student_info_id',$request->student_info_id)->where('form_type',$request->article_form_type)->get();
        for($i = 0 ; $i < count($leave_request) ; $i++){
            $leave_request[$i]->status = 1;
            $leave_request[$i]->save();
        }

        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function createDoneFormLink($id)
    {
        $article = ApprenticeAccountant::find($id);
        $article->yes_done_attach = 1;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function govCreateDoneFormLink($id)
    {
        $article = ApprenticeAccountantGov::find($id);
        $article->yes_done_attach = 1;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveRenewContractDate(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        $approve->contract_start_date = $request->renew_start_date;
        $approve->contract_end_date = $request->renew_end_date;
        //$approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function continueArticle(Request $request)
    {
        $article = ApprenticeAccountant::find($request->id);

        $article->contract_end_date = $request->contract_end_date;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

}
