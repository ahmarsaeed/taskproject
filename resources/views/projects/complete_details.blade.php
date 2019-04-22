@extends('layout.task_layout')
@section('title') All Detail @endsection

@section('body')

    <h3 class="text-uppercase border-bottom">Projects</h3>
<div class="row col-lg-12" >

    <div class="col-lg-6">

        <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
            <table class="table table-fixed cfd">
                <thead>
                <tr>
                    <th class="col-xs-12 text-uppercase"> Open </th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $p)
                    @if($p->status == 1)
                <tr>
                    <th class="col-xs-12">{{ $p->pro_name }}</th>
                </tr>
                    @else
                        <tr>
                            <th class="col-xs-12">No Projects In this List</th>
                        </tr>
                        @break
                  @endif

                    @endforeach



                </tbody>
            </table>
            </div>


    </div>
    <div class="col-lg-6">

        <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
            <table class="table table-fixed cfd">
                <thead>
                <tr>
                    <th class="col-xs-12 text-uppercase">Close </th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $p)
                    @if($p->status == 2)
                        <tr>
                        <th class="col-xs-12">{{ $p->pro_name }}</th>
                    </tr>
                    @else
                        <tr>
                            <th class="col-xs-12">No Projects In this List</th>
                        </tr>
                        @break

                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>


<br>
</div>
    <h3 class="text-uppercase border-bottom" >Tasks</h3>
    <div class="row col-lg-12" >
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Open </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $t)
                        @if($t->stage == 1 )
                    <tr>
                        <th class="col-xs-12">{{ $t->task_name }}</th>
                    </tr>

                    @else
                            <tr>
                                <th class="col-xs-12">No Task Is Open</th>
                            </tr>
                            @break
                            @endif

                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase"> In Progress </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $t)
                        @if($t->stage == 2 )
                            <tr>
                                <th class="col-xs-12">{{ $t->task_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No Task Is In Progress</th>
                            </tr>
                            @break
                        @endif

                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Review </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $t)
                        @if($t->stage == 3 )
                            <tr>
                                <th class="col-xs-12">{{ $t->task_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No Task Is In Review</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Rework </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $t)
                        @if($t->stage == 4 )
                            <tr>
                                <th class="col-xs-12">{{ $t->task_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No Task Need Rework</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Closed </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $t)
                        @if($t->stage == 5 )
                            <tr>
                                <th class="col-xs-12">{{ $t->task_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No Task Is Closed Yet</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>


    </div>

    <h3 class="text-uppercase border-bottom">Sub-Tasks</h3>
    <div class="row col-lg-12" >
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Open</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subtasks as $st)
                        @if($st->stage == 1 )
                            <tr>
                                <th class="col-xs-12">{{ $st->subtask_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No SubTask Is Open</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">In Progress</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subtasks as $st)
                        @if($st->stage == 2 )
                            <tr>
                                <th class="col-xs-12">{{ $st->subtask_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No SubTask Is In Progress</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Review</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subtasks as $st)
                        @if($st->stage == 3 )
                            <tr>
                                <th class="col-xs-12">{{ $st->subtask_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No SubTask Is In Review</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Rework</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subtasks as $st)
                        @if($st->stage == 4 )
                            <tr>
                                <th class="col-xs-12">{{ $st->subtask_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No SubTask Needed Rework</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="row" style="margin-left: -11px; margin-right: -9px;"  >
                <table class="table table-fixed cfd">
                    <thead>
                    <tr>
                        <th class="col-xs-12 text-uppercase">Closed</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subtasks as $st)
                        @if($st->stage == 5 )
                            <tr>
                                <th class="col-xs-12">{{ $st->subtask_name }}</th>
                            </tr>

                        @else
                            <tr>
                                <th class="col-xs-12">No SubTask Is Closed Yet</th>
                            </tr>
                            @break
                        @endif

                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>


    </div>



    <script>
        $(document).ready(function(){
           // alert('hi');
        });
    </script>


@endsection
