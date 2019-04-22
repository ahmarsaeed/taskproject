@extends('Layout.task_layout')
@section('title')
    Edit User
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


            <div>

                    <div   class="alert alert-danger" >
                        <span id="error_msg"></span>
                        <button type="button" class="close"  >x</button>

                    </div>



                {{--       <div id="error_msg" style="color: red "> </div> <br> <br>--}}
                {!! Form::model($user , ['id'=>'loginform' , 'route' => ['users.update' , $user->id] ,'method' => 'PUT']) !!}

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name:</label><br>
                            {!! Form::text('name' ,old('name') ,  ['placeholder' => 'Enter Username' , 'id' => 'name' , 'class' => 'admin-panel' ] )!!}
                            {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email:</label><br>
                            <input type="email" id="email"  name="email" placeholder="Enter Email" value="{{$user->email}}" class="admin-panel">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Password:</label><br>

                         {{--   {!! Form::password('password' ,  [  'placeholder' => 'Password' , 'id' => 'password' , 'class' => 'admin-panel'] )!!}--}}  {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                            <input type="password" value="{{$user->password}}" name="password" id="password" class="admin-panel">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Confirm Passsword:</label><br>
                        {{--    {!! Form::password('password_confirmation' ,  ['placeholder' => 'Confirm Password' , 'id' => 'confirm_password' , 'class' => 'admin-panel'] )!!}
                       --}}     <input type="password" value="{{$user->password}}" name="password_confirmation" id="password" class="admin-panel">

                            {{--  <input type="email" id="email" readonly  value="{{$counselor->email}}"  name="email" placeholder="Enter Email" class="admin-panel">--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label >Roles:</label><br>
                            <div class="checkbox">
                                @foreach ($roles as $role)
                                    <label class="customcheck chack-label"> <span style="margin-left: 30px">{{ $role->name , ucfirst($role->name ) }}</span>
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}"  >  <span class="checkmark" ></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div >



                {{--   {!! Form::label('username' , 'Username *'   ) !!}
                   {!! Form::text('username' ,old('username') ,  ['placeholder' => 'Enter Username' , 'id' => 'username'] )!!}
                   <br><br>
                   {!! Form::label('password' , 'Password *'  ) !!}
                   {!! Form::password('password' , old('password') , ['placeholder' => 'Enter password', 'id' => 'password'] )!!}
                   <br><br>
                   {!! Form::label('full_name' , 'Full Name '   ) !!}
                   {!! Form::text('full_name' , old('full_name') ,  ['placeholder' => 'Enter Full Name' , 'id' => 'fullname'] )!!}
                   <br><br>
                   {!! Form::label('email' , 'Email'  ) !!}
                   {!! Form::text('email' , old('email') , ['placeholder' => 'Enter Email', 'id' => 'email'] )!!}
                   <br><br>
                   {!! Form::label('phone' , 'Phone'   ) !!}
                   {!! Form::number('phone' , old('phone') ,  ['placeholder' => 'Enter Phone' , 'id' => 'phone'] )!!}
                   <br><br>
           --}}


                {!! Form::submit('Update' , ['class' => 'admin-panel2 btn btn-primary' , 'id' => 'onsubmit' , 'style' => 'margin-top:30px ; ']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous">

    </script>


    <script type="text/javascript">
        $(document).ready(function(){


            $(".alert").hide();
            $('.close').click(function(){
                $('.alert').hide();
            });

            $('#onsubmit').click(function(event){
                // alert($('#logintype').val());
                if( $('#username').val() === '' )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Name');
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

@extends('layout.app')

@section('title', '| Edit User')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h1>
        <hr>

        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}--}}
{{-- Form model binding to automatically populate our fields with user data --}}{{--


        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Give Role</b></h5>

        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
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
