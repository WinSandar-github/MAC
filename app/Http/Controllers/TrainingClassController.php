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
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $training_class = TrainingClass::find($id);
        return view('pages.edit_training', compact('training_class'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'training_name' => 'required',
        ]);
        $training_class = TrainingClass::find($id);
        $training_class->training_name = $request->training_name;
        $training_class->training_name_eng = $request->training_name_eng;
        $training_class->save();

        return redirect()->route('training.index')->with('success', 'Training Class Updated Successfully!');
    }
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
