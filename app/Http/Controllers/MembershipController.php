<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::with('requirements','descriptions')->get();
        return response()->json([
            'data' => $memberships
        ],200);
    }

    public function membership_list()
    {
        return view('pages.membership_list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $requirements = [];
        // foreach ($request->requirement_id as $require) {
        //     array_push($requirements, (int)$require);
        // }

        // $descriptions = [];
        // foreach ($request->description_id as $description) {
        //     array_push($descriptions, (int)$description);
        // }

        $membership = new Membership();
        $membership->membership_name          = $request->membership_name;
        $membership->requirement              = $request->requirement;
        $membership->description              = $request->description;
        $membership->form_fee                 = $request->form_fee;
        $membership->registration_fee         = $request->registration_fee;
        $membership->yearly_fee               = $request->yearly_fee;
        $membership->renew_fee                = $request->renew_fee;
        $membership->late_fee                 = $request->late_fee;
        $membership->cpa_subject_fee     = $request->cpa_subject_fee;
        $membership->da_subject_fee     = $request->da_subject_fee; 
        $membership->renew_cpa_subject_fee     = $request->renew_cpa_subject_fee;
        $membership->renew_da_subject_fee     = $request->renew_da_subject_fee; 
        $membership->renew_registration_fee     = $request->renew_registration_fee;
        $membership->renew_yearly_fee     = $request->renew_yearly_fee;    
        $membership->save();

        return response()->json([
            'message' => "Insert Successfully"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membership = Membership::find($id);
        return response()->json([
            'data' => $membership
        ],200);
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
        // return gettype($request->requirement_id);
        // $requirements = [];
        // foreach ($request->requirement_id as $require) {
        //     array_push($requirements, (int)$require);
        // }

        // $descriptions = [];
        // foreach ($request->description_id as $description) {
        //     array_push($descriptions, (int)$description);
        // }
        $membership = Membership::find($id);
        $membership->membership_name          = $request->membership_name;
        $membership->requirement              = $request->requirement;
        $membership->description              = $request->description;
        $membership->form_fee                 = $request->form_fee;
        $membership->registration_fee         = $request->registration_fee;
        //
        $membership->reg_fee_sole         = $request->reg_fee_sole;
        $membership->reg_fee_partner         = $request->reg_fee_partner;
        //
        $membership->yearly_fee               = $request->yearly_fee;
        $membership->renew_fee                = $request->renew_fee;
        //
        $membership->renew_fee_sole         = $request->renew_fee_sole;
        $membership->renew_fee_partner         = $request->renew_fee_partner;
        //
        $membership->late_fee                 = $request->late_fee;
        $membership->late_feb_fee                 = $request->late_feb_fee;
        $membership->reconnected_fee          = $request->reconnected_fee;
        $membership->reconnected_fee_before_2015          = $request->reconnected_fee_before_2015;
        ///
        $membership->late_fee_within_jan_sole                 = $request->late_fee_within_jan_sole;
        $membership->late_fee_within_jan_partner                 = $request->late_fee_within_jan_partner;
        $membership->late_fee_feb_to_apr_sole                 = $request->late_fee_feb_to_apr_sole;
        $membership->late_fee_feb_to_apr_partner                 = $request->late_fee_feb_to_apr_partner;
        $membership->reconnect_fee_sole                 = $request->reconnect_fee_sole;
        $membership->reconnect_fee_partner                 = $request->reconnect_fee_partner;
        $membership->cpa_subject_fee     = $request->cpa_subject_fee;
        $membership->da_subject_fee     = $request->da_subject_fee;  
        $membership->renew_cpa_subject_fee     = $request->renew_cpa_subject_fee;
        $membership->renew_da_subject_fee     = $request->renew_da_subject_fee; 
        $membership->renew_registration_fee     = $request->renew_registration_fee;
        $membership->renew_yearly_fee     = $request->renew_yearly_fee; 
        $membership->save();

        return response()->json([
            'message' => "Update Successfully"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::find($id);
        $membership->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);

    }

    public function showMembership($membership_name)
    {


        if($membership_name == 'all') {

            $memberships = Membership::get();


            return DataTables::of($memberships)
                ->addColumn('action', function ($membership) {
                    return "<div class='btn-group'>
                                <a  href='membership_edit/$membership->id' class='btn btn-primary btn-xs member_edit' >
                                    <li class='fa fa-edit fa-sm'></li>
                                </a>
                                 <button type='button' class='btn btn-danger btn-xs' onclick='deleteMembershipInfo(\"$membership->name\", $membership->id)'>
                                    <li class='fa fa-trash fa-sm'></li>
                                </button>
                            </div>";
                })
                  ->addColumn('requirements', function ($membership) {
                    return $membership->requirement ? "<small class='d-block '>".Str::limit($membership->requirement, 30, '...')."</small>" : '';


                    // return "<div>Str::limit($membership->requirement,30,...)</div>";
                })
                ->addColumn('descriptions', function ($membership) {
                       return $membership->description ? "<small class='d-block '>".Str::limit($membership->description, 30, '...')."</small>" : '';


                    // return "<div>$membership->description</div>";
                })
                ->rawColumns(['action','requirements','descriptions'])
                ->make(true);
                // ->addColumn('requirements', function ($membership) {

                //     // $requirements = Requirement::whereIn('id', json_decode($membership->requirement_id))->get('requirement_name');
                //     $requirements = Requirement::whereIn('id',explode(',', $membership->description_id))->get('requirement_name');

                //     $result = $requirements->map(function ($val) {
                //         return $val->requirement_name ? "<small class='d-block '> - " . Str::limit($val->requirement_name, 30, '...') . "</small>" : '';
                //     });

                //     return str_replace(',', '', implode(',', $result->toArray()));
                // })
                // ->addColumn('descriptions', function ($membership) {
                //     // $descriptions = Description::whereIn('id',json_decode($membership->description_id))->get('description_name');
                //     $descriptions = Description::whereIn('id',explode(',', $membership->description_id))->get('description_name');

                //     $result = $descriptions->map(function ($val) {
                //         return $val->description_name ? "<small class='d-block '> - " . Str::limit($val->description_name, 30, '...') . "</small>" : '';
                //     });

                //     return str_replace(',', '', implode(',', $result->toArray()));
                // })
                // ->rawColumns(['action', 'requirements','descriptions'])
                // ->make(true);
        }else{
            $courses = Course::where('name', 'like', '%' . $course_name. '%')->with('batches')->get();
            return response()->json([
                'data' => $courses
            ],200);
        }
    }

    // public function showDescription($membership_name)
    // {

    //     $memberships = Membership::where('membership_name', 'like', $membership_name. '%')->get();
    //     return response()->json([
    //         'data' => $memberships
    //     ],200);
    // }

    public function showFee($id)
    {

        $memberships = Membership::where('id',$id)->get();
        return response()->json([
            'data' => $memberships
        ],200);
    }

    public function showFees($id)
    {

        $memberships = Membership::where('id',$id)->get();
        return response()->json([
            'data' => $memberships
        ],200);
    }

    public function membership_edit($id)
    {
         $membership_id = $id;
         return view('pages.membership_edit',compact('membership_id'));
    }







}
