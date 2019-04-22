<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller ;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks  = Projects::select('projects.id' , 'pro_name' , 'tasks.id' , 'tasks.id' , 'tasks.task_name'  , 'tasks.due_date' , 'tasks.stage')
        ->                  join('tasks' , 'tasks.pro_id' , '=' , 'projects.id')
                            ->get();

     //$tasks = Tasks::all();
        return view ('tasks.index' , compact('tasks'))->with('sr' , 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Projects::select('id' , 'pro_name')->where('status' , 1 )->get();
        return view('tasks.create' , compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request['due_date']);
       /* $this->validate($request , [
           'pro_id' => 'required',
            'task_name' => 'required',
        ]);*/

        Tasks::create([
            'pro_id' => $request['pro_id'],
            'task_name' => $request['task_name'],
            'task_detail' => $request['task_detail'],
            'due_date' => $request['due_date'],
            'stage' => $request['stage'],
        ]);

        return redirect()->route('tasks.index')->with('message' , 'Task Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks  = Projects::select('projects.id as pro_id' , 'pro_name' , 'tasks.id' , 'tasks.id' , 'tasks.task_detail' ,'tasks.task_name'  , 'tasks.due_date' , 'tasks.stage')
                            ->join('tasks' , 'tasks.pro_id' , '=' , 'projects.id')
                           ->where('tasks.id' , '=' , $id)
                           ->get();

        $projects = Projects::select('id' , 'pro_name')->where('status' , 1 )->get();
       // dd($projects);
        $task = Tasks::findOrFail($id);
        return view('tasks.edit' , compact('tasks' , 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('h');
        Tasks::where('id', $id)->update([
            'pro_id' => $request['pro_id'],
            'task_name' => $request['task_name'],
            'task_detail' => $request['task_detail'],
            'due_date' => $request['due_date'],
            'stage' => $request['stage'],
        ]);
        return redirect()->route('tasks.index')->with('message' , 'Task Updated Sucessfully');
    }


    public function project_task()
    {
        $projects = Projects::select('id' , 'pro_name')->where('status' , 1 )->get();

        return view('tasks.project_task' , compact('projects'));
    }

    public function project_task_table( Request $request)
    {
       // dd($request->all());

        $tasks = Tasks::select('tasks.id' , 'tasks.task_name' , 'tasks.task_detail' , 'tasks.due_date' , 'tasks.stage' ,
                               'tasks.created_at' , 'tasks.updated_at' , 'projects.id as pro_id' , 'projects.pro_name')
                        ->join('projects' , 'projects.id' , '=' , 'tasks.pro_id')
                        ->where('tasks.pro_id' , $request['pro_id'])
                        -> get();
      //  dd($tasks);
        return view('tasks.project_task_table' , compact('tasks'))->with('sr' , 1 );

    }

    public function task_detail( Request $request)
    {
        // dd($request->all());

        $task_details = Tasks::select('tasks.id' , 'tasks.task_name' , 'tasks.task_detail' , 'tasks.due_date' , 'tasks.stage' ,
            'tasks.created_at' , 'tasks.updated_at' , 'projects.id as pro_id' , 'projects.pro_name' , 'projects.status',
            'projects.created_at as pro_created_at' , 'projects.start_date as pro_start_date' )
            ->join('projects' , 'projects.id' , '=' , 'tasks.pro_id' )
            ->where('tasks.pro_id' , $request['pro_id'])
            -> get();
        // dd($task_details);
        return view('tasks.task_details' , compact('task_details'))->with('sr' , 1 );

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
