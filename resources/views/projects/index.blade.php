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

        <a href="{{ route('projects.create') }}" class="btn btn-primary pull-right" >Add Project</a>
    </div>




    <div class="row">
        <div class="col-lg-12" style="margin-top: 30px">

            <table class="table table-bordered table-change">
                <thead>
                <tr>
                    <th class="col-lg-1">Sr</th>
                    <th class="col-lg-2"> Project Name</th>
                    <th class="col-lg-2"> Start Date</th>
                    <th class="col-lg-2"> Working days</th>
                    <th class="col-lg-2"> Working Hours</th>
                    <th class="col-lg-2"> Duration Step</th>
                    <th class="col-lg-1">Action</th>

                </tr>
                </thead>
                <tbody>
                @if( count($project) == 0 )

                <tr style="text-align: center">
                    <td colspan="12"> No Project Added Yet</td>
                </tr>

                @endif
                @foreach( $project as $p )
                    <tr>
                        <td class="col-lg-1">{{$sr++}}</td>
                        <td class="col-lg-2"> {{ $p->pro_name }}</td>
                        <td class="col-lg-2"> {{ $p->start_date }}</td>
                        <td class="col-lg-2"> {{ $p->working_days}}</td>
                        <td class="col-lg-2"> {{ $p->working_hours }}</td>
                        <td class="col-lg-2"> {{ $p->duration_step }}</td>

                        <td class="col-lg-1">

                            <a href="{{route('projects.edit' , [$p->id])}}" > <button class="btn btn-xs btn-primary"> Edit</button> </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['projects.destroy', $p->id] ]) !!}

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

