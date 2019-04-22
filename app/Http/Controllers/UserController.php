<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission ;
use Spatie\Permission\Models\Role ;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
   /* public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
            //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }*/

    public function index()
    {
        //

        $users = User::all();
        $role = Role::select('roles.id' , 'roles.name')
                      ->join('model_has_roles' , 'role_id' , '=' , 'roles.id')
                      ->join('users' , 'users.id' , '=' , 'model_id')->get();
         // dd($role);
        return view('users.index' , compact('users' , 'roles'))->with('sr' , 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
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
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);
       // dd('h');

        $roles = $request['roles']; //Retrieving the roles field
       // dd($roles);
        //Checking if a role was selected

       // dd($request->all());


        $user = User::create($request->only('email', 'name', 'password')); //Retrieving only the email and password data

        if (isset($roles)) {
  // dd('if');
            foreach ($roles as $role) {
               // dd('for');
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }

        //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('success_message',
                'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles
       // dd($roles);

        return view('users.edit', compact('user', 'roles')); //pass user and roles data to view

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
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);

        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
