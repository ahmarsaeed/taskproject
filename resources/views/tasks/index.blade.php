@extends('layout.task_layout')
@section('title')
    Projects List
@endsection

@section('body')


    @if($msg = session('message' ) )
        <div class="alert alert-success" id="alert_message" >
            <button type="button" class="close" data-dismiss="alert" >x</button>
            {{  $msg  }}
        </div>
    @endif

    <div >

        <a href="{{ route('projects.create') }}" class="btn btn-primary pull-right" >Add Tasks</a>
    </div>




    <div class="row">
        <div class="col-lg-12" style="margin-top: 30px">

            <table class="table table-bordered table-change">
                <thead>
                <tr>
                    <th class="col-lg-1">Sr</th>
                    <th class="col-lg-2"> Project Name</th>
                    <th class="col-lg-2"> Task Name</th>
                    <th class="col-lg-2"> Due Date</th>
                    <th class="col-lg-2"> Stage</th>
                    <th class="col-lg-1">Action</th>

                </tr>
                </thead>
                <tbody>
                @if( count($tasks) == 0 )

                    <tr style="text-align: center">
                        <td colspan="12"> No Tasks Added Yet</td>
                    </tr>

                @endif
                @foreach( $tasks as $t )
                    <tr>
                        <td class="col-lg-1">{{$sr++}}</td>
                        <td class="col-lg-2"> {{ $t->pro_name }}</td>
                        <td class="col-lg-2"> {{ $t->task_name }}</td>
                        <td class="col-lg-2">  @if( $t->due_date != null ){{ date('Y-m-d' , strtotime($t->due_date))}} @else  @endif</td>
                        <td class="col-lg-2"> {{ $t->stage }}</td>

                        <td class="col-lg-1">

                            <a href="{{route('tasks.edit' , [$t->id])}}" > <button class="btn btn-xs btn-primary"> Edit</button> </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $t->id] ]) !!}

                            <button  type="submit" class="btn btn-xs btn-danger"> Delete</button>
                            </form>
                            {!! Form::close() !!}


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

