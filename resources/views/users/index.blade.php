
@extends('Layout.task_layout')
@section('title')
    User List
@endsection

@section('body')
    @if($msg = session('message' ) )
        <div class="alert alert-success" id="alert_message" >
            <button type="button" class="close" data-dismiss="alert" >x</button>
            {{  $msg  }}
        </div>
    @endif

    <div>
        <div class="row">
            <div class="col-lg-12">

                <table class="table table-bordered table-change">
                    <thead>
                    <tr>
                        <th class="col-lg-1">Sr</th>
                        <th class="col-lg-2"> Name </th>
                        <th class="col-lg-2"> Email </th>
                        <th class="col-lg-3">Role</th>
                        <th class="col-lg-1">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $users as $u )
                        <tr>
                            <td class="col-lg-1">{{$sr++}}</td>
                            <td class="col-lg-2">{{ $u->name }}</td>
                            <td class="col-lg-2">{{$u->email}}</td>

                            <td class="col-lg-3"> <button class="btn btn-xs btn-success">{{$u->roles()->pluck('name')->implode(' ') }} </button> </td>--}}{{-- Retrieve array of roles associated to a user and convert to string --}}3
                            <td class="col-lg-1">

                             <a href="{{route('users.edit' , [$u->id])}}" > <button class="btn btn-xs btn-primary"> Edit</button> </a>
                             {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $u->id] ]) !!}

                                       <button  type="submit" class="btn btn-xs btn-danger"> Delete</button>
                                </form>
                              {!! Form::close() !!}

                               {{-- <a href="{{ route('users.edit' ,[ $u->id ]) }}" ><button  class=" btn-xs btn-primary">Edit</button> </a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $u->id] ]) !!}
                                <button type="submit" class=" btn-xs btn-danger">Delete</button>
                                  {!! Form::close() !!}
--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <script>
        $(document).ready(function(){
            //alert('hi');
            $('.close').click(function(){
                $('#alert_message').hide();
            });
        });
    </script>



@endsection




{{--
@extends('layout.task_layout')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                       <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>--}}{{--
--}}
{{-- Retrieve array of roles associated to a user and convert to string --}}{{--
--}}
{{--
                      --}}{{--
  <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

    </div>



@endsection--}}
