<?php

namespace App\Http\Controllers;

use App\Training_type;
use Illuminate\Http\Request;

class TrainingTypeController extends Controller
{
    public function index()
    {
        $training_types = Training_type::get();
        return view('pages.training_type',compact('training_types'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Training_type $training_type)
    {
        //
    }
    public function edit(Training_type $training_type)
    {
        $training_type = Training_type::find($training_type);
        return view('pages.edit_training_type',compact('training_type'));
    }
    public function update(Request $request, Training_type $training_type)
    {
        $request->validate([
            'training_type_name' => 'required'
        ]);
        $training_type->training_type_name = $request->training_type_name;
        $training_type->save();
        return redirect(route('training_type.index'));
    }
    public function destroy(Training_type $training_type)
    {
        //
    }
}
