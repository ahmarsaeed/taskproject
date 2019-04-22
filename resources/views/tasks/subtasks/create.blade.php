@extends('layout.task_layout')

@section('title')
    Add SubTask
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
           {!! Form::open(['id'=>'subtasks' , 'route' => 'sub_tasks_store' ,'method' => 'POST']) !!}

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Project :</label><br>
                        <select name="pro_id" id="pro_id" class="admin-panel">
                            <option value="0" > Select Project </option>
                            @foreach($projects as $p)

                                <option value="{{ $p->id }}" >  {{ $p->pro_name }} </option>

                            @endforeach
                        </select>

                    </div>
                </div>

               <div id="tasks_list" class="col-lg-6" >


               </div>

            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>SubTask Name:</label><br>
                        {!! Form::text('subtask_name' ,'' ,  ['placeholder' => 'Enter Task Name' , 'id' => 'subtask_name' , 'class' => 'admin-panel' ] )!!}
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Due Date:</label><br>
                        <input type="date" name="due_date" class="admin-panel" id="due_date" >
                        {{--<input type="text" style="margin-left:38px ; padding: 10px"  name="first_name" placeholder="Enter First Name" class="admin-panel">--}}
                    </div>
                </div>



            </div>


            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group">
                        <label> SubTask Detail :</label><br>
                        <textarea style=" height:130px" class="admin-panel"   type="text" name="subtask_detail" id="subtask_detail" placeholder="Enter Task Detail"  />
                        </textarea>

                    </div>
                </div>

            </div>


        </div>



        {!! Form::submit('Add Subtask' , ['class' => 'admin-panel2 btn btn-lg btn-primary' , 'id' => 'osubmit' , 'style' => 'margin-top:30px']) !!}




{{--        {!! Form::close() !!}--}}
    </div>
    </div>




    <script type="text/javascript">
        $(document).ready(function(){

            $(".alert").hide();
            $('.close').click(function(){
                $('.alert').hide();
            });



            $('#pro_id').on('change' , function(){
                //alert('g');
                var pro_id = $(this).val();
                var url = '{{ url('subtasks/tasks_list') }}' ;
               // alert(pro_id );
                $.ajax({
                    url: url ,
                    type: 'get',
                    data:{ pro_id  },
                    success:function(data)
                    {
                        $('#tasks_list').html(data);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        alert(xhr.status);
                        alert(xhr.statusText);
                        alert(xhr.responseText);
                    }
                });
            });





            $('#osubmit').click(function(event){

                if( $('#pro_id').val() == 0 )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Select Project');
                    return false ;
                }
                if( $('#task_id').val() == 0 )
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Select Task Against Which SubTask want to be Made');
                    return false ;
                }

                if( $('#subtask_name').val() == '')
                {
                    $(".alert").show();
                    $("#error_msg").text('Please Enter Subtask Name');
                    return false ;
                }


            });
        });

    </script>

@endsection
