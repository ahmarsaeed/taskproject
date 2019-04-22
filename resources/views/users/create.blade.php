
@extends('layout.task_layout')

@section('title')
    Add User
@endsection
@section('body')

    <div class="row">
        <div class="col-md-12">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if($msg = session('message') )
                <div class="alert alert-success" >
                    <button type="button" class="close" data-dismiss="alert" >x</button>
                    {{  $msg  }}
                </div>
            @endif
            @endforeach

                <div   class="alert alert-danger" >
                    <span id="error_msg"></span>
                    <button type="button" class="close"  >x</button>

                </div>

          {{--<div id="error_msg"  style="color: red "> </div> <br> <br>--}}
            {!! Form::open(['id'=>'User_form' , 'route' => 'users.store' ,'method' => 'POST']) !!}

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> Name:</label><br>
                        {!! Form::text('name' ,'' ,  ['placeholder' => 'Enter Name' , 'id' => 'name' , 'class' => 'admin-panel' ] )!!}
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> Email:</label><br>

                        <input type="email" id="email"  name="email" placeholder="Enter Email" class="admin-panel">
                        {{--   {!! Form::email('email' , ['class' => 'admin-panel' , 'placeholder' => 'Enter Email' , 'id' => 'email'] ) !!}
                         {{ Form::email('email', '', array('class' => 'form-control')) }}--}}
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Password:</label><br>
                        {{ Form::password('password',  ['class' => 'admin-panel' , 'placeholder' => 'Enter Password' , 'id' => 'password'] ) }}
                        {{--  <input type="password" id="password"   name="password" placeholder="Enter Password" class="admin-panel">--}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Confirm Password:</label><br>
                        {!! Form::password('password_confirmation' ,  ['placeholder' => 'Confirm Password' , 'id' => 'confirm_password' , 'class' => 'admin-panel'] )!!}
                       {{-- {{ Form::password('password_confirmation', array('class' => 'form-control' , 'place')) }}--}}
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>

            </div>
         {{--   <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Role:</label><br>
                       --}}{{-- {!! Form::text('Role' ,'' ,  ['placeholder' => 'Enter  Number' , 'id' => 'phone' , 'class' => 'admin-panel'] )!!}
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                        @endforeach--}}{{--

                        --}}{{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}{{--
                    </div>
                </div>

            </div>--}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                <label >Roles:</label><br>
                <div class="checkbox">
                    @foreach ($roles as $role)
                    <label class="customcheck chack-label"> <span style="margin-left: 30px">{{ $role->name , ucfirst($role->name ) }}</span>
                        <input type="checkbox" name="roles[]" value="{{$role->id}}" ><span class="checkmark" ></span>
                    </label>
                    @endforeach
                </div>
                            </div>
                    </div>
                    </div >  {{-- role check box end --}}
        </div>
            {{-- <div class="row">
                 <div class="col-lg-6">
                 <div class="form-group">
                     <label>   User Type:</label><br>
                     <select class="admin" name="logintype" id="logintype">
                         <div class="admin-tech">
                             <option value="0">Select Type</option>
                             <option value="1">Admin</option>
                             <option value="2">Counselor</option>
                             <option value="3"></option>
                             <option value="4">Counselor</option>
                         </div>
                     </select>
                 </div>
                 </div>

             </div>--}}

            {!! Form::submit('Add User' , ['class' => 'admin-panel2 btn btn-lg btn-primary' , 'id' => 'osubmit' , 'style' => 'margin-top:30px']) !!}




            {!! Form::close() !!}
        </div>
    </div>


    {{--  <script
              src="https://code.jquery.com/jquery-2.2.4.min.js"
              integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
              crossorigin="anonymous">

      </script>--}}

    <script type="text/javascript">
        $(document).ready(function(){
            //alert('hi');
            $(".alert").hide();
            $('.close').click(function(){
                $('.alert').hide();
            });
            $('#osubmit').click(function(event){
                // alert($('#logintype').val());
                if( $('#name').val() == '' )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Enter name');
                    return false ;
                }
                if( $('#password').val() == '' )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Enter Password');
                    return false ;
                }
                if( $('#email').val() == '' )
                {
                    $(".alert").show();
                    $("#error_msg").text('Email is Mandatory');
                    return false ;
                }

            });
        });

    </script>

@endsection





{{--
@extends('layout.task_layout')

@section('title')
    Add User
 @endsection

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-user-plus'></i> Add User</h1>
        <hr>

        {{ Form::open(['method' => 'post' , 'route' => ['users.store'] ]) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', '', array('class' => 'form-control')) }}
        </div>

        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password') }}<br>
            {{ Form::password('password', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::label('password', 'Confirm Password') }}<br>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

        </div>

        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection--}}
