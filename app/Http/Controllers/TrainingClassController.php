<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingClass;

class TrainingClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $training_classes = TrainingClass::all();
        return view('pages.training_class', compact('training_classes'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training_class = TrainingClass::find($id);
        return view('pages.edit_training', compact('training_class'));
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
        $training_class = TrainingClass::find($id);
        $training_class->training_name = $request->training_name;
        $training_class->start_date = $request->start_date;
        $training_class->end_date = $request->end_date;
        $training_class->save();

        return redirect()->route('training.index')->with('success', 'Training Class Updated Successfully!');
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

    public function delete($id)
    {
        $training_class = TrainingClass::find($id);
        $training_class->delete();
        
        return redirect()->route('training.index')->with('success', 'Training Class Deleted Successfully!');
    }
}
