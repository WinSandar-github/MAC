<?php

namespace App\Http\Controllers;

use App\Batch;
use App\TMSClass;
use App\TrainingClass;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('training_classes')->get();
        $tmsclasses = TMSClass::get();
        return view('pages.batch', compact('batches','tmsclasses'));
    }
    public function create()
    {
        $training_classes = TrainingClass::get();
        $classes = TMSClass::get();
        return view('pages.create_batch',compact('training_classes','classes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'batch_name' => 'required',
            'training_class' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);
        $batch = new Batch;
        $batch->batch_name = $request->batch_name;
        $batch->training_id = $request->training_class;
        $batch->from = $request->from;
        $batch->to = $request->to;
        $batch->class_id = json_encode($request->class);
        $batch->publish_status = 1;
        $batch->save();
        return redirect()->route('batch.index')->with('success','Batches are Successfully Saved');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $training_classes = TrainingClass::get();
        $classes = TMSClass::get();
        $batch = Batch::find($id);
        return view('pages.edit_batch', compact('batch','training_classes','classes'));
    }
    public function update(Request $request, $id)
    {
        $batch = Batch::find($id);
        $batch->batch_name = $request->batch_name;
        $batch->training_id = $request->training_class;
        $batch->from = $request->from;
        $batch->to = $request->to;
        $batch->class_id = json_encode($request->class);
        $batch->save();

        return redirect()->route('batch.index')->with('success', 'Batch Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();

        return redirect()->route('batch.index')->with('success', 'Batch Deleted Successfully!');
    }
}
