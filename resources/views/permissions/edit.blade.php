@extends('layout.task_layout')

@section('title')
    Add Role
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

         {{--   <div id="error_msg" style="color: red "> </div> <br> <br>--}}
                {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Permission Name:</label><br>
                        {!! Form::text('name' ,old($permission->name) ,  ['placeholder' => 'Enter Permission Name' , 'id' => 'name' , 'class' => 'admin-panel' ] )!!}
                           </div>
                </div>


            </div>



        </div>

        {!! Form::submit('Update Permission' , ['class' => 'admin-panel2 btn btn-lg btn-primary' , 'id' => 'osubmit' , 'style' => 'margin-top:30px']) !!}




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

@section('title', '| Edit Permission')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
        <br>
        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}--}}
{{-- Form model binding to automatically populate our fields with permission data --}}{{--


        <div class="form-group">
            {{ Form::label('name', 'Permission Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <br>
        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection--}}
