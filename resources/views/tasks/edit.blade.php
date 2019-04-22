@extends('layout.task_layout')

@section('title')
    Edit Task
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
            {!! Form::Model( $tasks , ['id'=>'tasks' , 'route' => ['tasks.update' , $tasks[0]['id'] ] ,'method' => 'PUT']) !!}

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Duration Step:</label><br>
                        <select name="pro_id" id="pro_id" class="admin-panel">
                            <option value="0" > Select Project </option>
                            @foreach($projects as $p)

                                <option value="{{ $p->id }} " @if($tasks[0]['pro_id'] == $p->id ) selected @else @endif>  {{ $p->pro_name }} </option>

                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Task Name:</label><br>
                        {!! Form::text('task_name' , $tasks[0]['task_name'] ,  ['placeholder' => 'Enter Task Name' , 'id' => 'task_name' , 'class' => 'admin-panel' ] )!!}
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Due Date:</label><br>
                        <input type="date" value="{{ $tasks[0]['due_date'] }}" name="due_date" class="admin-panel" id="due_date" >
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Duration Step:</label><br>
                        <select name="stage" id="stage" class="admin-panel">
                            <option value="0" > Select Stage </option>
                            <option value="1"  @if($tasks[0]['stage'] == 1) selected @else @endif > Open </option>
                            <option value="2"  @if($tasks[0]['stage'] == 2) selected @else @endif > In Progress </option>
                            <option value="3"  @if($tasks[0]['stage'] == 3) selected @else @endif > Under Review </option>
                            <option value="4"  @if($tasks[0]['stage'] == 4) selected @else @endif > Rework </option>
                            <option value="5"  @if($tasks[0]['stage'] == 5) selected @else @endif > Done </option>
                        </select>

                    </div>
                </div>

            </div>

            <div class="row">


            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Task Detail :</label><br>

                        <textarea style=" height:130px" class="admin-panel"   type="text" name="task_detail" id="task_detail" placeholder="Enter Task Detail"  />

                        {{ $tasks[0]['task_detail'] }}

                        </textarea>

                    </div>
                </div>

            </div>


        </div>



        {!! Form::submit('Add Task' , ['class' => 'admin-panel2 btn btn-lg btn-primary' , 'id' => 'osubmit' , 'style' => 'margin-top:30px']) !!}




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

                if( $('#pro_id').val() == 0 )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Select Project');
                    return false ;
                }
                if( $('#task_name').val() === '' )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Enter Task Name');
                    return false ;
                }

                if( $('#stage').val() == 0 )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Select Project Stage');
                    return false ;
                }


            });
        });

    </script>

@endsection
