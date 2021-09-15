<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamDepartment;

class ExamDepartmentController extends Controller
{
    public function getExamDepartment()
    {
        $exam_dept = ExamDepartment::get();
        return response()->json([
            'data' => $exam_dept
        ],200);
    }
}
