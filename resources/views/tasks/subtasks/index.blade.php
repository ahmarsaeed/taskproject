@extends('layout.task_layout')
@section('title')
    Projects List
@endsection

@section('body')


    @if($msg = session('message' ) )
        <div class="alert alert-success" id="alert_message" >
            <button type="button" class="close" data-dismiss="alert" >x</button>
            {{  $msg }}
        </div>
    @endif

    <div >

        <a href="{{ route('sub_tasks_create') }}" class="btn btn-primary pull-right" >Add SubTask</a>
    </div>




    <div class="row">
        <div class="col-lg-12" style="margin-top: 30px">

            <table class="table table-bordered table-change">
                <thead>
                <tr>
                    <th class="col-lg-1">Sr</th>
                    <th class="col-lg-2"> Sub Task Name</th>
                    <th class="col-lg-2"> Task Name</th>
                    <th class="col-lg-2"> Due Date</th>
                    <th class="col-lg-2"> Stage</th>
                    <th class="col-lg-1">Action</th>

                </tr>
                </thead>
                <tbody>
                @if( count($subtasks) == 0 )

                    <tr style="text-align: center">
                        <td colspan="12"> No  SubTask Added Yet</td>
                    </tr>

                @endif
                @foreach( $subtasks as $st )
                    <tr>
                        <td class="col-lg-1">{{$sr++}}</td>
                        <td class="col-lg-2"> {{ $st->subtask_name }}</td>
                        <td class="col-lg-2"> {{ $st->task_name }}</td>
                        <td class="col-lg-2">  @if( $st->due_date != null ){{ date('Y-m-d' , strtotime($st->due_date))}} @else  @endif</td>
                        <td class="col-lg-2"> {{ $st->stage }}</td>

                        <td class="col-lg-1">

                            <a href="{{url('subtasks/'.$st->id.'/edit')}}" > <button class="btn btn-xs btn-primary"> Edit</button> </a>

                          {{--  {!! Form::open(['method' => 'post', 'route' => 'sub_tasks_detail' ]) !!}
                            <input type="hidden" value="{{$st->id}}" name="subtask_id" />
                            <input type="hidden" value="{{$st->task_id}}" name="task_id" />
                            <button  type="submit" class="btn btn-xs btn-primary"> Detail </button>

                            {!! Form::close() !!}--}}

                            <a href="{{url('subtasks/subtasks_detail/'.$st->id  )}} " > <button class="btn btn-xs btn-primary"> Detail</button> </a>



                            {{--     {!! Form::open(['method' => 'DELETE', 'route' => ['subtasks.destroy', $st->id] ]) !!}--}}

                            <button  type="submit" class="btn btn-xs btn-danger"> Delete</button>
                            </form>
                          {{--  {!! Form::close() !!}--}}


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

