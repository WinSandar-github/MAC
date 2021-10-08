<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamRegister;
use App\StudentInfo;
use App\StudentRegister;
use App\StudentCourseReg;
use App\ExamDepartment;
use App\Batch;
use App\Invoice;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ExamRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_registers = ExamRegister::all();
        return response()->json([
            'data' => $exam_registers
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_info_id = $request->student_id;
        $exam_type = StudentRegister::where('student_info_id', $student_info_id)->latest()->get('type');
        $type = $exam_type[0]['type'];
        $batch = StudentCourseReg::where('student_info_id', $student_info_id)->latest()->get('batch_id');
        $batch_id = $batch[0]['batch_id'];

        // if ($request->hasfile('invoice_image'))
        // {
        //     $file = $request->file('invoice_image');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/exam_register/',$name);
        //     $invoice_image = '/storage/exam_register/'.$name;
        // }
        // $date = date('Y-m-d');
        $invoice_date = date('Y-m-d');
        $exam = new ExamRegister();
        $exam->student_info_id = $request->student_id;
        $exam->date = $request->date;
        //$exam->invoice_image = $invoice_image;
        $exam->invoice_date = $invoice_date;
        $exam->private_school_id = $request->private_school_id;
        $exam->private_school_name = $request->private_school_name;
        $exam->grade = 0;
        $exam->batch_id = $batch_id;
        $exam->is_full_module = $request->is_full_module;
        $exam->exam_type_id = $type;
        $exam->form_type = $request->form_type;
        $exam->exam_department = $request->exam_department;
        $exam->status = 0;
        $exam->save();

        //invoice
        $invNo = str_pad($exam->id, 20, "0", STR_PAD_LEFT);

        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_id;
        $invoice->invoiceNo       = $invNo;
        $invoice->status          = 0;
        $invoice->save();
        
        return "You have successfully registerd!";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $exam_register = ExamRegister::where('batch_id',$id)->get();
        // return response()->json([
        //     'data' => $exam_register
        // ],200);
        $exam_register =  ExamRegister::with('student_info','batch','exam_department','course')->where('id',$id)->get();

        return response()->json([
            'data' => $exam_register
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approveExam($id)
    {
        $approve = ExamRegister::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that form!"
        ], 200);
    }

    public function rejectExam($id)
    {
        $reject = ExamRegister::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that form!"
        ], 200);
    }

    // public function FilterExamRegistration(Request $request)
    // {
    //     $exam_register = ExamRegister::with('student_info');
    //     if($request->name!=""){
    //         $exam_register =  $exam_register->join('student_infos', 'exam_register.student_info_id', '=', 'student_infos.id')
    //         ->where('student_infos.name_mm', 'like', '%' . $request->name. '%')
    //         ->orWhere('student_infos.name_eng', 'like', '%' . $request->name. '%');
    //     }
    //     if($request->batch!="all")
    //     {
    //         $exam_register = $exam_register->where('batch_i', $request->batch);
    //     }
    //     $exam_register =  $exam_register->where('form_type', $request->course_code)->get();
    //     // $exam_register =  $exam_register->get();
    //     return response()->json([
    //         'data' => $exam_register
    //     ],200);
    // }

    public function FilterExamRegistration(Request $request)
    {

        $exam_register = ExamRegister::with('student_info')
            ->where('status', '=', $request->status)
            ->whereHas('student_info', function ($q) use ($request) {
                if ($request->name !== "") {
                    $q->where('name_mm', 'like', "%" . $request->name . "%")
                        ->orWhere('name_eng', 'like', "%" . $request->name . "%");
                }
                if ($request->batch != "all") {
                    $q->where('batch_id', $request->batch);
                }
            })
            ->where('form_type', '=', $request->course_code)->get();

        // DA One
        $datatable = DataTables::of($exam_register)
            ->addColumn('exam_type', function ($infos) {
                if ($infos->form_type == 1) {
                    return "DA - I";
                } else if ($infos->form_type == 2) {
                    return "DA - II";
                } else if ($infos->form_type == 3) {
                    return "CPA - I";
                } else {
                    return "CPA - II";
                }
            })
            ->addColumn('remark', function ($infos) {
                if ($infos->grade == 0) {
                    return "-";
                } else if ($infos->grade == 1) {
                    return "PASSED";
                } else {
                    return "FAILED";
                }
            })
            ->addColumn('status', function ($infos) {
                if ($infos->status == 0) {
                    return "PENDING";
                } else if ($infos->status == 1) {
                    return "APPROVED";
                } else {
                    return "REJECTED";
                }
            });

        if ($request->course_code == 1) {
            $datatable = $datatable->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm' onclick='showExam($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                        </div>";
            });

            if ($request->status == 1) {
                $datatable = $datatable->addColumn('print', function ($infos) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='printExamCard($infos->student_info_id,$infos->id,$infos->form_type)'>
                                    <li class='fa fa-print fa-sm'></li>
                                </button>
                            </div>";
                });
                $datatable = $datatable->addColumn('exam_room', function ($infos) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showExamRoomModal($infos->student_info_id,$infos->id)'>
                                    <li class='fa fa-edit fa-sm'></li>
                                </button>
                            </div>";
                });
            }
        } else if ($request->course_code == 2) {
            $datatable = $datatable->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showDaTwoExam($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            });
            if ($request->status == 1) {
                $datatable = $datatable->addColumn('print', function ($infos) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='printExamCard($infos->student_info_id,$infos->id,$infos->form_type)'>
                                    <li class='fa fa-print fa-sm'></li>
                                </button>
                            </div>";
                });
            }
        } else if ($request->course_code == 3) {
            $datatable = $datatable->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showCPAOneExam($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            });
            if ($request->status == 1) {
                $datatable = $datatable->addColumn('print', function ($infos) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='printCPAOneExamCard($infos->student_info_id,$infos->id,$infos->form_type)'>
                                    <li class='fa fa-print fa-sm'></li>
                                </button>
                            </div>";
                });
            }
        } else {
            $datatable = $datatable->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showCPATwoExam($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            });
            if ($request->status == 1) {
                $datatable = $datatable->addColumn('print', function ($infos) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='printCPAOneExamCard($infos->student_info_id,$infos->id,$infos->form_type)'>
                                    <li class='fa fa-print fa-sm'></li>
                                </button>
                            </div>";
                });
            }
        }

        if ($request->status == 1) {
            $datatable = $datatable->rawColumns(['action', 'print', 'exam_type', 'remark', 'status','exam_room'])->make(true);
        } else {
            $datatable = $datatable->rawColumns(['action', 'exam_type', 'remark', 'status'])->make(true);
        }

        return $datatable;
    }


    public function viewStudent($id)
    {
        $exam_register = ExamRegister::where('id', $id)->with('student_info','subjects','course')->get();
        return response()->json([
            'data' => $exam_register
        ], 200);
    }

    public function cpaExamRegister(Request $request)
    {
        // return($request->last_ans_module);

        $student_info_id = $request->student_id;
        $exam_type = StudentRegister::where('student_info_id', $student_info_id)->latest()->get('type');
        $type = $exam_type[0]['type'];
        $batch = StudentCourseReg::where('student_info_id', $student_info_id)->latest()->get('batch_id');
        $batch_id = $batch[0]['batch_id'];


        // $student_info_id = $request->student_id;

        // $batch_id = StudentCourseReg::where('student_info_id', $student_info_id)->first()->batch_id;
        // $exam_type = Batch::where('id',$batch_id)->first()->course_id;


        $date = date('d-M-Y');
        $invoice_date = date('Y-m-d');

        $exam = new ExamRegister();

        $exam->student_info_id = $request->student_id;
        $exam->last_ans_exam_no = $request->last_ans_exam_no;

        $exam->date = $date;
        $exam->invoice_date = $invoice_date;
        $exam->private_school_id = $request->private_school_id;
        $exam->private_school_name = $request->private_school_name;
        $exam->grade = 0;
        $exam->batch_id = $batch_id;
        $exam->is_full_module = $request->is_full_module;
        $exam->exam_department = $request->exam_department;
        //exam type id mean mac self study private school
        $exam->exam_type_id = $type;
        $exam->form_type = $request->form_type;
        $exam->status = 0;
        $exam->save();
        //invoice
        $invNo = str_pad($exam->id, 20, "0", STR_PAD_LEFT);

        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_id;
        $invoice->invoiceNo       = $invNo;
        $invoice->status          = 0;
        $invoice->save();

        return "You have successfully registerd!";
    }

    public function getExamByStudentID($id)
    {
        $exam_register = ExamRegister::where('student_info_id', $id)->with('course')->get();
        return response()->json([
            'data' => $exam_register
        ], 200);

    }

    public function getPassedExamByStudentID($id)
    {
        $exam_register = ExamRegister::where('student_info_id', $id)->where('grade', 1)->with('course', 'batch')->get();
        return response()->json([
            'data' => $exam_register
        ], 200);

    }

    public function getExamStatus($id)
    {
        $stu_course_reg = StudentCourseReg::where('student_info_id', $id)->with('batch')->latest()->first();
        $student_register = ExamRegister::where('student_info_id', $id)->where('form_type', $stu_course_reg->batch->course_id)->first();

        $status = $student_register != NULL ? $student_register->status : null;

        return response()->json($status, 200);
    }




    // public function FilterExamRegister(Request $request){
    //     $student_infos = ExamRegister::with('student_info','batch')->where('form_type',$request->course_code)->where('status',1);
    //     if($request->name!=""){
    //       dd("1");
    //         $student_infos = $student_infos->join('student_infos', 'exam_register.student_info_id', '=', 'student_infos.id')
    //         ->where('student_infos.name_mm', 'like', '%' . $request->name. '%')
    //         ->orWhere('student_infos.name_eng', 'like', '%' . $request->name. '%');
    //     }
    //     if($request->grade!="all"){
    //       dd("2");
    //         $student_infos = $student_infos->where('grade',$request->grade);
    //     }
    //     if($request->batch!="all"){
    //       dd("3");
    //         $student_infos = $student_infos->where('batch_id', $request->batch);
    //     }
    //     $student_infos = $student_infos->get();
    //
    //     return response()->json([
    //         'data' => $student_infos
    //     ],200);
    // }

    public function FilterExamRegister(Request $request)
    {
        $exam_register = ExamRegister::with('student_info', 'batch:id,name_mm', 'course:id,code,name_mm')
            ->where('status', '=', 1)
            ->where('form_type', '=', $request->course_code)
            ->whereHas('student_info', function ($q) use ($request) {
                if ($request->name !== "") {
                    $q->where('name_mm', 'like', "%" . $request->name . "%")
                        ->orWhere('name_eng', 'like', "%" . $request->name . "%");
                }
                if ($request->batch != "all") {
                    $query->where('batch_id', $request->batch);
                }
            })
            ->where('grade', '=', $request->grade)->get();

        // DA One
        $datatable = DataTables::of($exam_register)->addColumn('exam_type', function ($infos) {
            if ($infos->form_type == 1) {
                return "DA - I";
            } else if ($infos->form_type == 2) {
                return "DA - II";
            } else if ($infos->form_type == 3) {
                return "CPA - I";
            } else {
                return "CPA - II";
            }
        })
            ->addColumn('remark', function ($infos) {
                if ($infos->grade == 0) {
                    return "-";
                } else if ($infos->grade == 1) {
                    return "PASSED";
                } else {
                    return "FAILED";
                }
            })
            ->addColumn('module', function ($infos) {
                if ($infos->is_full_module == 1) {
                    return "Module 1";
                } else if ($infos->is_full_module == 2) {
                    return "Module 2";
                } else {
                    return "All Module";
                }
            });

        if ($request->course_code == 1) { // da 1
            $datatable = $datatable->addColumn('action', function ($infos) {
                if ($infos->grade == 1) { // grade = 1 is Passed List
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' onclick='fillMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                                <a class='btn btn-info btn-sm p' target='_blank' title='Certificate' href='" . route('certificate', ['id' => $infos->student_info_id, 'course_code' => $infos->course->code]) . "'>
                                    <li class='fa fa-file-text-o fa-sm'></li>
                                </a>
                            </div>";
                }

                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' onclick='fillMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            });
        } else if ($request->course_code == 2) { // da 2
            $datatable = $datatable->addColumn('action', function ($infos) {
                if ($infos->grade == 1) { // grade = 1 is passed list
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' onclick='fillMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                                <a class='btn btn-info btn-sm p' target='_blank' title='Certificate' href='" . route('certificate', ['id' => $infos->student_info_id, 'course_code' => $infos->course->code]) . "'>
                                    <li class='fa fa-file-text-o fa-sm'></li>
                                </a>
                            </div>";
                }

                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm' onclick='fillMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                        </div>";
            });
        } else if ($request->course_code == 3) { // cpa 1
            $datatable = $datatable->addColumn('action', function ($infos) {
                if($infos->grade == 1 ){
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' onclick='fillMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                                <a class='btn btn-info btn-sm p' target='_blank' title='Certificate' href='" . route('certificate', ['id' => $infos->student_info_id, 'course_code' => $infos->course->code]) . "'>
                                    <li class='fa fa-file-text-o fa-sm'></li>
                                </a>
                            </div>";
                }
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='fillCPAMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            });
        } else {
            $datatable = $datatable->addColumn('action', function ($infos) {
                if($infos->grade == 1 ){
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' onclick='fillMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                                <a class='btn btn-info btn-sm p' target='_blank' title='Certificate' href='" . route('certificate', ['id' => $infos->student_info_id, 'course_code' => $infos->course->code]) . "'>
                                    <li class='fa fa-file-text-o fa-sm'></li>
                                </a>
                            </div>";
                }
                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm' onclick='fillCPAMark($infos->id,$infos->is_full_module,$infos->form_type)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                        </div>";
            });
        }
        $datatable = $datatable->rawColumns(['action', 'print', 'exam_type', 'remark', 'module'])->make(true);
        return $datatable;
    }
}
