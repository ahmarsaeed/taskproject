<?php

namespace App\Http\Controllers;


use App\Projects;
use App\Subtask;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller ;

class SubtaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $subtasks = Subtask::select( 'subtasks.id' , 'subtask_name' , 'tasks.id as task_id' , 'tasks.task_name' )
                              ->join('tasks' , 'tasks.id' , '=' , 'subtasks.task_id')
                              ->where('subtasks.status' , 1 )
                              ->get();
       // dd($subtasks);
        return view('tasks.subtasks.index' , compact('subtasks'))->with('sr' , 1 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Projects::select('id' , 'pro_name')->where('status' , 1 )->get();


       // dd($tasks);
        return view('tasks.subtasks.create' , compact('projects'));
    }

    public function tasks_list(Request $request)
    {
        dd('h');
    }

    public function project_tasks_list( Request $request )
    {
        dd('h');
        $tasks = Tasks::where('stage' , '<' ,  5 )->get();
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
     * @param  \App\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function show(Subtask $subtask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtask $subtask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subtask $subtask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtask $subtask)
    {
        //
    }
}
