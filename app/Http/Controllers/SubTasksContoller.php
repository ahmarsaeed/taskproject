<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Subtask;
use App\Tasks;
use Illuminate\Routing\Controller ;

class SubTasksContoller extends Controller
{
    public function index()
    {
        $subtasks = Subtask::select( 'subtasks.id' , 'subtask_name' , 'tasks.id as task_id' , 'tasks.task_name' ,
                                     'subtasks.due_date' , 'subtasks.stage', 'projects.id as pro_id' ,'projects.pro_name'  )
                                    ->join('tasks' , 'tasks.id' , '=' , 'subtasks.task_id')
                                    ->join('projects' , 'projects.id' , '=' , 'tasks.pro_id')
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
       // dd('h');
        $tasks = Tasks::select('tasks.id' , 'task_name')
                        ->join( 'projects' , 'projects.id' , '=' , 'tasks.pro_id')
                       -> where('projects.id' , $request['pro_id'])
                       ->where('stage' , '<' ,  5 )->get();
       // dd($tasks);
        return view('tasks.subtasks.task_against_project' , compact('tasks'));
    }

    public function store( Request $request)
    {
        //dd('store');
        //dd($request->all());
        Subtask::create([
            'task_id' => $request['task_id'],
            'subtask_name' => $request['subtask_name'],
            'due_date' => $request['due_date'],
            'subtask_detail' => $request['subtask_detail']
        ]);
        return redirect()->route('sub_tasks_index')->with('message' , 'SubTask Added Successfully');
    }


    public function edit($id )
    {
         //dd($task_id);

        $subtasks = Subtask::select('subtasks.id' , 'subtask_name' , 'tasks.id as task_id' , 'tasks.task_name' ,
            'subtasks.due_date' , 'subtasks.stage', 'projects.id as pro_id' ,'projects.pro_name',
             'subtasks.subtask_detail')
            ->join('tasks' , 'tasks.id' , '=' , 'subtasks.task_id')
            ->join('projects' , 'projects.id' , '=' , 'tasks.pro_id')
            ->where('subtasks.id' , $id )->get();
       // dd($subtasks);

        return  view('tasks.subtasks.edit' , compact('subtasks'));
    }


    public function update($id , Request $request)
    {
        //dd($id);
        //dd($request->all());
            Subtask::where('id' , $id )->update([
            'task_id' => $request['task_id'],
            'subtask_name' => $request['subtask_name'],
            'due_date' => $request['due_date'],
            'subtask_detail' => $request['subtask_detail']
        ]);
        return redirect()->route('sub_tasks_index')->with('message' , 'SubTask Added Successfully');

    }

    public function subtasks_detail(Request $request)
    {
        //dd($request['subtask_id']);


        $subtask_detail = Subtask::select('subtasks.id' , 'subtask_name' , 'subtask_detail' ,'subtasks.due_date',
                                         'tasks.id as task_id' , 'subtasks.stage' , 'tasks.task_name' ,
                                          'tasks.due_date as task_due_date' , 'tasks.created_at as task_created_at' ,
                                          'tasks.stage' , 'projects.id as pro_id' ,'tasks.task_detail', 'projects.pro_name' ,
                                          'projects.status as pro_status' ,'projects.created_at as pro_created_at' ,
                                          'projects.start_date as pro_start_date')
                                   ->join('tasks' , 'tasks.id' , '=' , 'subtasks.task_id')
                                   ->join('projects' , 'projects.id' , '=' , 'tasks.pro_id')
                                   ->where('subtasks.id' , $request['subtask_id'])
                                   ->get();
       // dd($subtask_detail);
        return view('tasks.subtasks.subtask_detail' , compact('subtask_detail'));

    }



    public function project_task_select(Request $request)
    {
               // dd($subtask_detail);
        $projects = Projects::select('id' , 'pro_name')->where('status' , 1 )->get();
        return view('tasks.subtasks.project_task_select' , compact('projects') );
    }

    public function project_tasks_subtask_list(Request $request)
    {
        //dd('h');
        $subtasks = Subtask::select( 'subtasks.id' , 'subtask_name' , 'tasks.id as task_id' , 'tasks.task_name' ,
            'subtasks.due_date' , 'subtasks.stage' )
            ->join('tasks' , 'tasks.id' , '=' , 'subtasks.task_id')
            ->join('projects' , 'projects.id' , '=' , 'tasks.pro_id')
        ->where('tasks.id' , $request['task_id'])-> where('projects.id' , $request['pro_id'])
            ->where('subtasks.status' , 1 )
            ->get();
       // dd($subtasks);
        return view('tasks.subtasks.project_task_subtask' , compact('subtasks'))->with('sr' , 1 );

    }
}
