<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project ;
use App\User ;

use Illuminate\Routing\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        dd($project);
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
        $this->validate($request, [
            'pro_name'=>'required|max:120',
        ]);
        $project = Project::create([
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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit' , compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $this->validate( $request , [
            'pro_name' => 'required|max:120'
        ]);

        Project::where('id' , $id )->update([
            'pro_name' => $request['pro_name'],
            'start_date' => $request['start_date'],
            'duration_step' => $request['duration_step'],
            'working_days' => $request['working_days'],
            'working_hours' => $request['working_hours'],

        ]);

        return redirect()->route('projects.index')->with('message' , 'Project Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
