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

          {{--  <div id="error_msg" style="color: red "> </div> <br> <br>--}}
            {!! Form::open(['id'=>'User_form' , 'url' => 'roles' ,'method' => 'POST']) !!}

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> Name:</label><br>
                        {!! Form::text('name' ,'' ,  ['placeholder' => 'Enter Name' , 'id' => 'name' , 'class' => 'admin-panel' ] )!!}
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Assign Permissions:</label><br>
                        <div class="checkbox" >
                            <label class="customcheck chack-label"> <span style="margin-left: 30px">Select ALL </span>
                                <input type="checkbox" id="select_all" name="select_all" value="1">   <span id="" class="checkmark ">    </span>
                            </label>

                        </div>

                        <div class="checkbox">
                            @foreach ($permissions as $permission)
                                <label class="customcheck chack-label"> <span style="margin-left: 30px">{{ $permission->name, ucfirst($permission->name ) }}</span>
                                    <input class="permissions"type="checkbox" name="permissions[]" value="{{$permission->id}}" ><span class="checkmark" ></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div >  {{-- role check box end --}}
        </div>



        {!! Form::submit('Add Role' , ['class' => 'admin-panel2 btn btn-lg btn-primary' , 'id' => 'osubmit' , 'style' => 'margin-top:30px']) !!}




        {!! Form::close() !!}
    </div>
    </div>




    <script type="text/javascript">
        $(document).ready(function(){


            $(".alert").hide();
            $('.close').click(function(){
                $('.alert').hide();
            });




            $('#select_all').click(function(event){
                //  alert( $('#select_all').val() );
                if( this.checked )
                {
                    // alert('y');
                    $(':checkbox').each(function() {
                        this.checked = true;
                    });
                    //   $('input[type=checkbox]').prop('checked');
                    /* $('#checked_select_all').prop('checked');*/
                }
                else {
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });


          /*  $('.permissions').click( function(event){
               // alert('h');
                var value = this.checked ;

                alert(value);



            });*/





            $('#osubmit').click(function(event){

                if( $('#name').val() === '' )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Enter Role name');
                    return false ;
                }
                  /* var value = $('.permissions').attr('checked');
                      alert(value);
                   if( ! $('.permissions').attr('checked') )
                   {
                       $("#error_msg").text('Please Select atleast 1 Permission');
                       return false ;
                   }

*/

            });
        });

    </script>

@endsection


{{--
@extends('layout.app')

@section('title', '| Add Role')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> Add Role</h1>
        <hr>

        {{ Form::open(array('url' => 'roles')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Assign Permissions</b></h5>

        <div class='form-group'>
            @foreach ($permissions as $permission)
                {{ Form::checkbox('permissions[]',  $permission->id ) }}
                {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

            @endforeach
        </div>

        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection--}}
