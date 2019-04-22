@extends('Layout.task_layout')
@section('title')
   Role List
@endsection

@section('body')
    <div >
        <a href="{{ route('users.index') }}" class="btn btn-default ">Users</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-default ">Permissions</a></h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary pull-right">Add Role</a></h1>
    </div>

    @if($error = Session::get('error' ) )
        <div class="alert alert-success" id="alert_message" >
            <button type="button" class="close" data-dismiss="alert" >x</button>
            {{  $error  }}
        </div>
    @endif


    <div class="row">
        <div class="col-lg-12" style="margin-top: 30px">

            <table class="table table-bordered table-change">
                <thead>
                <tr>
                    <th class="col-lg-1">Sr</th>
                    <th class="col-lg-2"> Role Name </th>
                    <th class="col-lg-3"> Permission </th>
                    <th class="col-lg-1">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $roles as $r )
                    <tr>
                        <td class="col-lg-1">{{$sr++}}</td>
                        <td class="col-lg-2"> {{ $r->name }}</td>


                        <td class="col-lg-3">  <button class="btn btn-xs btn-success">  {{$r->permissions()->pluck('name')->implode(' ,  ') }} </button>   </td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                        <td class="col-lg-1">

                            <a href="{{route('roles.edit' , [$r->id])}}" > <button class="btn btn-xs btn-primary"> Edit</button> </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $r->id] ]) !!}

                            <button  type="submit" class="btn btn-xs btn-danger"> Delete</button>
                            </form>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

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
@extends('layout.app')

@section('title', '| Roles')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-key"></i> Roles

            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($roles as $role)
                    <tr>

                        <td>{{ $role->name }}</td>

                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>--}}
{{-- Retrieve array of permissions associated to a role and convert to string --}}{{--

                        <td>
                            <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

    </div>

@endsection--}}
