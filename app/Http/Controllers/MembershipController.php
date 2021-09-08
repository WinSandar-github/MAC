<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;

use App\Requirement;

use App\Description;

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
        $membership->requirement_id           = $request->requirement_id;
        $membership->description_id           = $request->description_id;
        $membership->form_fee                 = $request->form_fee;
        $membership->registration_fee         = $request->registration_fee;
        $membership->yearly_fee               = $request->yearly_fee;
        $membership->renew_fee                = $request->renew_fee;
        $membership->late_fee                 = $request->late_fee;
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
        $membership->requirement_id           = $request->requirement_id;
         $membership->description_id           = $request->description_id;
        $membership->form_fee                 = $request->form_fee;
        $membership->registration_fee         = $request->registration_fee;
        $membership->yearly_fee               = $request->yearly_fee;
        $membership->renew_fee                = $request->renew_fee;
        $membership->late_fee                 = $request->late_fee;
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
                                <button type='button' class='btn btn-primary btn-xs' onclick='showMembershipInfo($membership->id)'>
                                    <li class='fa fa-edit fa-sm'></li>
                                </button>
                                 <button type='button' class='btn btn-danger btn-xs' onclick='deleteMembershipInfo(\"$membership->name\", $membership->id)'>
                                    <li class='fa fa-trash fa-sm'></li>
                                </button>
                            </div>";
                })
                ->addColumn('requirements', function ($membership) {
                   
                    // $requirements = Requirement::whereIn('id', json_decode($membership->requirement_id))->get('requirement_name');
                    $requirements = Requirement::whereIn('id',explode(',', $membership->description_id))->get('requirement_name');

                    $result = $requirements->map(function ($val) {
                        return $val->requirement_name ? "<small class='d-block '> - " . Str::limit($val->requirement_name, 30, '...') . "</small>" : '';
                    });

                    return str_replace(',', '', implode(',', $result->toArray()));
                })
                ->addColumn('descriptions', function ($membership) {
                    // $descriptions = Description::whereIn('id',json_decode($membership->description_id))->get('description_name');
                    $descriptions = Description::whereIn('id',explode(',', $membership->description_id))->get('description_name');
                    
                    $result = $descriptions->map(function ($val) {
                        return $val->description_name ? "<small class='d-block '> - " . Str::limit($val->description_name, 30, '...') . "</small>" : '';
                    });

                    return str_replace(',', '', implode(',', $result->toArray()));
                })
                ->rawColumns(['action', 'requirements','descriptions'])
                ->make(true);
        }else{
            $courses = Course::where('name', 'like', '%' . $course_name. '%')->with('batches')->get();
            return response()->json([
                'data' => $courses
            ],200);
        }
    }
}
