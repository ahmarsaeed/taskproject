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
            <div id="error_msg" style="color: red "> </div> <br> <br>
            {!! Form::Model($project , ['id'=>'project' , 'route' => ['projects.update' , $project->id ]  ,'method' => 'PUT']) !!}

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Project Name:</label><br>
                        {!! Form::text($project->pro_name , $project->pro_name ,  ['placeholder' => 'Enter Project Name' , 'id' => 'pro_name' , 'class' => 'admin-panel' ] )!!}
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Start Date:</label><br>
                        <input type="date" value=" @if ( $project->start_date != null   ){{ $project->start_date->formate('d.m.Y') }} @else  @endif" name="start_date" class="admin-panel" id="start_date" >
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Duration Step:</label><br>
                        <select name="duration_step" id="duration_step" class="admin-panel">
                            <option value="0" > Select Step </option>
                            <option value="1" @if($project->duration_step == 1) selected @else @endif > Hourly </option>
                            <option value="2"  @if($project->duration_step == 2) selected @else @endif  > Monthly </option>
                        </select>

                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Working Days / Week :</label><br>
                        <select name="working_days" id="duration_step" class="admin-panel">
                            <option value="0" > Select Working Days </option>
                            <option value="1"  @if($project->working_days == 1) selected @else @endif  > 1 </option>
                            <option value="2" @if($project->working_days == 2) selected @else @endif  > 2 </option>
                            <option value="3" @if($project->working_days == 3) selected @else @endif > 3 </option>
                            <option value="4" @if($project->working_days == 4) selected @else @endif  > 4 </option>
                            <option value="5" @if($project->working_days == 5) selected @else @endif  > 5 </option>
                            <option value="6"  @if($project->working_days == 6) selected @else @endif > 6 </option>
                            <option value="7" @if($project->working_days == 7) selected @else @endif  > 7 </option>

                        </select>

                    </div>
                </div>

            </div>

            <div class="row">


                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Working Hours:</label><br>
                        <div id="range-slider-1" class="range-slider"></div>
                        <span id="range-time-1" class="range-time"></span>
                    </div>
                </div>


            </div>



        </div>



        {!! Form::submit('Update Project' , ['class' => 'admin-panel2 btn btn-lg btn-primary' , 'id' => 'osubmit' , 'style' => 'margin-top:30px']) !!}




        {!! Form::close() !!}
    </div>
    </div>




    <script type="text/javascript">
        $(document).ready(function(){

            $('#osubmit').click(function(event){

                if( $('#pro_name').val() === '' )
                {
                    $("#error_msg").text('Please Project Name');
                    return false ;
                }


            });
        });

    </script>

@endsection
