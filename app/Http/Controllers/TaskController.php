<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        return view('task.index',['tasks'=>$tasks]);
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
        $validated = $request->validate([
            'writed_task' => 'required',
            

        ], [
                'writed_task.required' => 'Notunuzu yazmadınız.'
                

            ]);

        $task=new Task;
        $task->writed_task= $request->writed_task;
        $task->priority_level=$request->priority_level;
        $task->last_date=$request->last_date;
        $task->save();
        return redirect('/task')->with('success', 'Notunuz eklenmiştir.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task= Task::find($request->id);
        $task->result=$request->result;
        $task->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task= Task::find($id);
        $task->delete();
        return redirect()->back();


    }
    public function result( $result){
        if($result=="add_task"){
            $tasks= Task::where('result',$result)->get();
            return view('task.index',['tasks'=>$tasks]);
        }
        elseif($result=="completed"){
            $tasks= Task::where('result',$result)->get();
            return view('task.completed',['tasks'=>$tasks]);
        }
        elseif($result=="not_completed"){
            $tasks= Task::where('result',$result)->get();
            return view('task.not_completed',['tasks'=>$tasks]);
        }
        elseif($result=="deleted"){
            $tasks= Task::where('result',$result)->get();
            return view('task.deleted',['tasks'=>$tasks]);
        }
       
    }

    public function last_day(){
      
        $tasks=Task::whereDate('last_date', '=', Carbon::today()->toDateString())
        ->where('result','=','not_completed')->get();
        return view('task.not_completed',['tasks'=>$tasks]);
    
    }
}
