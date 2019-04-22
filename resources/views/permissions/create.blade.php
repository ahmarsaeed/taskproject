@extends('layout.task_layout')

@section('title')
    Add Permission
@endsection
@section('body')

    <div class="row">
        <div class="col-md-12">

            @if($error = Session::get('error' ) )
                <div class="alert alert-success" >
                    <button type="button" class="close" data-dismiss="alert" >x</button>
                    {{  $error  }}
                </div>
            @endif

                <div   class="alert alert-danger" >
                    <span id="error_msg"></span>
                    <button type="button" class="close"  >x</button>

                </div>

           {{-- <div id="error_msg" style="color: red "> </div> <br> <br>--}}
            {!! Form::open(['id'=>'permission' , 'url' => 'permissions' ,'method' => 'POST']) !!}

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Permission Name:</label><br>
                        {!! Form::text('name' ,'' ,  ['placeholder' => 'Enter Permission Name' , 'id' => 'name' , 'class' => 'admin-panel' ] )!!}
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        @if(!$roles->isEmpty())
                        <label >Assign Permissions to Role:</label><br>
                        <div class="checkbox">
                            @foreach ($roles as $role)
                                <label class="customcheck chack-label"> <span style="margin-left: 30px">{{ $role->name, ucfirst($role->name)}}</span>
                                    <input type="checkbox" name="'roles[]'" value="{{$role->id}}" ><span class="checkmark" ></span>
                                </label>
                            @endforeach
                                @endif
                        </div>
                    </div>
                </div>
            </div >  {{-- role check box end --}}

              {{--  @if(!$roles->isEmpty()) //If no roles exist yet
                <h4>Assign Permission to Roles</h4>

                @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                @endforeach
                @endif--}}


        </div>



        {!! Form::submit('Add Permission' , ['class' => 'admin-panel2 btn btn-lg btn-primary' , 'id' => 'osubmit' , 'style' => 'margin-top:30px']) !!}




        {!! Form::close() !!}
    </div>
    </div>




    <script type="text/javascript">
        $(document).ready(function(){


            $(".alert").hide();
            $('.close').click(function(){
                $('.alert').hide();
            });



            $('#osubmit').click(function(event){

                if( $('#name').val() === '' )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Enter Permission Name');
                    return false ;
                }


            });
        });

    </script>

@endsection




{{--
@extends('layout.app')

@section('title', '| Create Permission')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> Add Permission</h1>
        <br>

        {{ Form::open(array('url' => 'permissions')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div><br>
        @if(!$roles->isEmpty()) //If no roles exist yet
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
        @endif
        <br>
        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection--}}
