<?php

namespace App\Http\Controllers;

use App\StudentInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class ApproveRejectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = StudentInfo::all();
        return view('pages.daapproval.index', compact('users'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = StudentInfo::with('education_histroy','student_job')->find($id);
        if (empty($user)) {
            Alert::error('Error', 'User Not Found');
            return redirect(route('da_approval.index'));
        }
        return view('pages.daapproval.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = StudentInfo::find($id);
        $user->approve_reject_status = 1;
        $user->save();
        Alert::success('Approved', 'You Successfully approved that user!');
        return redirect(route('da_approval.index'));
    }

    public function reject(Request $request, $id)
    {
        $user = StudentInfo::find($id);
        $user->approve_reject_status = 2;
        $user->save();
        Alert::success('Approved', 'You have rejected that user!');
        return redirect(route('da_approval.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
