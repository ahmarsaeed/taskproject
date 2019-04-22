@extends('layout.task_layout')
@section('title')
    Projects List
@endsection

@section('body')
    <div >

        {{--<a href="{{ route('projects.create') }}" class="btn btn-primary pull-right" >Add Project</a>--}}
    </div>
    @if($error = Session::get('error' ) )
        <div class="alert alert-success" id="alert_message" >
            <button type="button" class="close" data-dismiss="alert" >x</button>
            {{  $error  }}
        </div>
    @endif



    <div class="row">



        <div class="col-lg-6">
            <div class="form-group">
                <label>Projects:</label><br>
                <select name="pro_id" id="pro_id" class="admin-panel">
                    <option value="0" > Select Project </option>
                    @foreach($projects as $p)

                        <option id="project_id" value="{{ $p->id }}" >  {{ $p->pro_name }} </option>

                    @endforeach
                </select>

            </div>
        </div>


        <div class="col-lg-12" style="margin-top: 0px">

            <div id="project_task_table" > </div>

        </div >


    </div>



    <script>
        $(document).ready(function(){
            //alert('hi');
/*

          $('#task_detail').click(function(){

             var id = $(this).val();
              alert( id );
          });
*/


            $('.close').click(function(){
                $('#alert_message').hide();
            });

            $('#pro_id').on('change' , function(){
                var pro_id = $(this).val();
                var url = '{{ url('task/project_task_table') }}' ;
               // alert(url);
               // alert(pro_id);

                $.ajax({
                    url: url ,
                    type : 'get' ,
                    data:{ pro_id  } ,
                    success:function(data)
                    {
                        $('#project_task_table').html(data);
                    }
                });


            });






        });
    </script>



@endsection

