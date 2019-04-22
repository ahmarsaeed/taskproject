@extends('layout.task_layout')
@section('title') Task Detail @endsection

@section('body')

    <h3 class="text-uppercase border-bottom">Project And Task Detail</h3>
    <div class="col-lg-12">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-fixed cfd">
                        <thead>
                        <tr>
                            <th class="col-xs-12 text-uppercase">Project </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="col-xs-2">Project Name:</th><th class="col-xs-10">{{ $task_details[0]['pro_name'] }}</th>
                        </tr>
                        <tr>
                            <th class="col-xs-2">Status:</th><th class="col-xs-10">   {{ $task_details[0]['status'] }}</th>
                        </tr>
                        <tr>
                            <th class="col-xs-2">Entry Date</th><th class="col-xs-10">{{ date('Y-m-d') , strtotime( $task_details[0]['pro_created_at'] ) }}</th>
                        </tr>
                        <tr>
                            <th class="col-xs-2">Start Date:</th><th class="col-xs-10 ">{{ date('Y-m-d') , strtotime( $task_details[0]['pro_start_date'] ) }}</th>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Task Detail </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="col-xs-2">Task Name:</th><th class="col-xs-10">{{ $task_details[0]['task_name'] }}</th>
                    </tr>
                    <tr>
                        <th class="col-xs-2">Due Date:</th><th class="col-xs-10">{{ date( 'Y-m-d') , strtotime( $task_details[0]['due_date'] ) }}</th>
                    </tr>
                    <tr>
                        <th class="col-xs-2">Entry Date</th><th class="col-xs-10">{{ date('Y-m-d') , strtotime( $task_details[0]['created_at'] ) }}</th>
                    </tr>
                    <tr>
                        <th class="col-xs-2">Stage:</th><th class="col-xs-10">

                            @if( $task_details[0]['stage'] == 1 )       Open
                            @elseif ( $task_details[0]['stage'] == 2 )  In Progress
                            @elseif ( $task_details[0]['stage'] == 3 )  Under Review
                            @elseif ( $task_details[0]['stage'] == 4 )  Rework
                            @elseif ( $task_details[0]['stage'] == 2 )  Done

                             @endif

                            </th>
                    <tr>
                        <th class="col-xs-2">Task Detail</th><th class="col-xs-10">{{ $task_details[0]['task_detail'] }}</th>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection