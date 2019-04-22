@extends('Layout.task_layout')
@section('title')
    Permission List
@endsection

@section('body')


    @if($msg = session('message' ) )
        <div class="alert alert-success" id="alert_message" >
            <button type="button" class="close" data-dismiss="alert" >x</button>
            {{  $msg  }}
        </div>
    @endif

    <div >
        <a href="{{ route('users.index') }}" > <button  class="btn btn-default " >Users </button> </a>
        <a href="{{ route('roles.index') }}" class="btn btn-default ">Roles</a>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary pull-right" >Add Permission</a>
    </div>


    <div class="row">
        <div class="col-lg-12" style="margin-top: 30px">

            <table class="table table-bordered table-change">
                <thead>
                <tr>
                    <th class="col-lg-1">Sr</th>
                    <th class="col-lg-4"> Permission Name </th>
                    <th class="col-lg-2">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $permissions as $p )
                    <tr>
                        <td class="col-lg-1">{{$sr++}}</td>
                        <td class="col-lg-4"> {{ $p->name }}</td>

                          <td class="col-lg-2">

                            <a href="{{route('permissions.edit' , [$p->id])}}" > <button class="btn btn-xs btn-primary"> Edit</button> </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $p->id] ]) !!}

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

@section('title', '| Permissions')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-key"></i>Available Permissions

            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

    </div>

@endsection--}}
