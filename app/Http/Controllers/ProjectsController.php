<?php

namespace App\Http\Controllers;


use App\Projects;
use App\Subtask;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator ;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Projects::all();
       // dd( count( $project )  );
        return view('projects.index' , compact('project'))->with('sr' , 1 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hi');
      /*  $this-> validate($request, [
            'pro_name' => 'required|max:120'
        ]);*/
      //  dd('store');
        $project = Projects::create([
            'pro_name' => $request['pro_name'],
            'start_date' => $request['start_date'],
            'duration_step' => $request['duration_step'],
            'working_days' => $request['working_days'],
            'working_hours' => $request['working_hours'],

        ]);
        return redirect()->route('projects.index') -> with ('message' , 'Project added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('projects.edit' , compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('update');
       /* $this->validate( $request , [
            'pro_name' => 'required|max:120'
        ]);*/

        Projects::where('id' , $id )->update([
            'pro_id' => $request['pro_id'],
            'start_date' => $request['start_date'],
            'duration_step' => $request['duration_step'],
            'working_days' => $request['working_days'],
            'working_hours' => $request['working_hours'],

        ]);

        return redirect()->route('projects.index')->with('message' , 'Project Update Successfully');

    }


    public function complete_details()
    {
       // dd('h');

        $projects = Projects::select('id' , 'pro_name' , 'status')->where('status' , 1 )->get();

        $tasks = Tasks::select('id' , 'task_name' , 'stage')->where('status' , 1 )->get();

        $subtasks = Subtask::select('id' , 'subtask_name' , 'stage' )->where('status' , 1 )->get();


        return view('projects.complete_details' , compact('projects' , 'tasks' ,  'subtasks') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
