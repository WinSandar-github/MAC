<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return View
     */
    public function index(string $page)
    {
        //$role = Role::create(['name'=>'writer']);

        //$permission = Permission::create(['name' => 'edit articles']);

        // if ( view()->exists("pages.reporting_list") ) {

        //     $courses = Course::all();
        //     $batches = Batch::all();

        //     return view('pages.reporting_list', compact('batches', 'courses'));
        // }

        if (view()->exists("pages.{$page}")) {
//            if ($page == 'reporting_list') {
//                $batches = Batch::all();
//
//                return view('pages.reporting_list', compact('batches'));
//            }
//
           return view("pages.{$page}");
        } else if (view()->exists("pages.teacher.{$page}")) {
            return view("pages.teacher.{$page}");
        } else if (view()->exists("pages.qt_application.{$page}")) {
            return view("pages.qt_application.{$page}");
        } else if (view()->exists("pages.article.{$page}")) {
            return view("pages.article.{$page}");
        } else if (view()->exists("pages.school.{$page}")) {
            return view("pages.school.{$page}");
        } else if (view()->exists("pages.batch.{$page}")) {
            return view("pages.batch.{$page}");
        } else if (view()->exists("pages.exam.{$page}")) {
            return view("pages.exam.{$page}");
        } else if (view()->exists("pages.course.{$page}")) {
            return view("pages.course.{$page}");
        } else if (view()->exists("pages.requirement.{$page}")) {
            return view("pages.requirement.{$page}");
        } else if (view()->exists("pages.audit_firm.{$page}")) {
            return view("pages.audit_firm.{$page}");
        } else if (view()->exists("pages.audit_firm_card.{$page}")) {
            return view("pages.audit_firm_card.{$page}");
        } else if (view()->exists("pages.cpa.{$page}")) {
            return view("pages.cpa.{$page}");
        } else if (view()->exists("pages.papp.{$page}")) {
            return view("pages.papp.{$page}");
        } else if (view()->exists("pages.da.{$page}")) {
            return view("pages.da.{$page}");
        } else if (view()->exists("pages.mentor.{$page}")) {
            return view("pages.mentor.{$page}");
        } else if (view()->exists("pages.da_registration_approval.{$page}")) {
            return view("pages.da_registration_approval.{$page}");
        } else if (view()->exists("pages.da_approve_reject.{$page}")) {
            return view("pages.da_approve_reject.{$page}");
        } else if (view()->exists("pages.cpa_one_approve_reject.{$page}")) {
            return view("pages.cpa_one_approve_reject.{$page}");
        } else if (view()->exists("pages.cpa_two_approve_reject.{$page}")) {
            return view("pages.cpa_two_approve_reject.{$page}");
        } else if (view()->exists("pages.cpa_ff_approve_reject.{$page}")) {
            return view("pages.cpa_ff_approve_reject.{$page}");
        } else if (view()->exists("pages.papp_approve_reject.{$page}")) {
            return view("pages.papp_approve_reject.{$page}");
        } else if (view()->exists("pages.exam_form.{$page}")) {
            return view("pages.exam_form.{$page}");
        } else if (view()->exists("pages.exam_cards.{$page}")) {
            return view("pages.exam_cards.{$page}");
        } else if (view()->exists("pages.exam_result.{$page}")) {
            return view("pages.exam_result.{$page}");
        } else if (view()->exists("pages.entry_exam.{$page}")) {
            return view("pages.entry_exam.{$page}");
        } else if (view()->exists("pages.qualified_test.{$page}")) {
            return view("pages.qualified_test.{$page}");
        } else if (view()->exists("pages.esign.{$page}")) {
            return view("pages.esign.{$page}");
        }

        return abort(404);

    }
}



