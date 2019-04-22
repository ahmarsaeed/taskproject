<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:300,400,500" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/reset.css')}}"> <!-- CSS reset -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}"><!-- Resource style -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/custom-style-table.css')}}">





    <link rel="stylesheet" type="text/css" href="">
    <script src="{{url('assets/js/modernizr.js')}}"></script> <!-- Modernizr -->


    <!-- scripts  -->

    <script src="{{url('assets/js/jquery-2.1.4.js')}}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script src="{{url('assets/js/jquery.menu-aim.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script> <!-- Resource jQuery -->


    <title>@yield('title')</title>
</head>

<body>
<div class="container-fluid no-padding">
  {{--  <header class=" cd-main-header" >
         <a href="#0" class="cd-logo"><img  src="{{url('assets/img/logo.png')}}" class="img-responsive" alt="Logo"></a>


        <a href="#0" class="cd-nav-trigger"><span></span></a>

        <nav class="cd-nav">

            <ul class="cd-top-nav">
              @guest

            --}}{{--    <li class=" has-children account">

                        <div class=""> Login </div>

                </li>
                <li class="has-children account">

                    <div class=""> Register</div>

                </li>
--}}{{--

                <li class=" ">

                    <a  href="{{ route('login') }}">
                        <div class="account">  Login   </div>
                    </a>
                </li>
                <li class="has-children account ">
                    <a href="{{ route('register') }}">
                        <div class="account"><h3> Register </h3> </div>
                    </a>


                </li>

      @else



                <li class="has-children account">
                    <a href="#0">
                        <div class="account"><h3>{{ Auth::user()->name }}</h3></div>
                      --}}{{--  <div><img src="{{url('assets/img/hassan-khan.png')}}" alt="avatar"></div>--}}{{--
                    </a>
                    <ul>

                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit(); ">LogOut</a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>

    @endguest
            </ul>
        </nav>
    </header> <!-- .cd-main-header -->--}}
    <main class="cd-main-content">
        <nav class="cd-side-nav" >


            <div id='cssmenu'>
                <ul>
                   {{-- <li class='active'><a href='{{ url('/home') }}'><img src="{{url('assets/img/home.png')}}" class="img-responsive"><span>Home</span></a></li>
                   --}}

                    @if( !auth()->user() )

                    <li class='active'><a href='{{ route('login') }}'><img src="{{url('assets/img/home.png')}}" class="img-responsive"><span>Login</span></a></li>

                    <li class='active'><a href='{{ route('register') }}'><img src="{{url('assets/img/home.png')}}" class="img-responsive"><span>Register</span></a></li>



                  @else


                        <li class='has-sub'><a href='#'><img src="{{url('assets/img/student-degree.png')}}" class="img-responsive"><span> Welcome {{ auth()->user()->name }}</span></a>
                            <ul>
                                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit(); " >LogOut</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </ul>
                        </li>


                    <li class='active'><a href='{{ route('complete_details') }}'><img src="{{url('assets/img/home.png')}}" class="img-responsive"><span>Home</span></a></li>



                    <li class='has-sub'><a href='#'><img src="{{url('assets/img/student-degree.png')}}" class="img-responsive"><span>User Managment</span></a>
                        <ul>
                            <li><a href="{{route('users.create')}}">Add User</a></li>
                            <li><a href="{{route('users.index')}}">View User</a></li>
                            <li><a href="{{route('roles.create')}}">Add Role</a></li>
                            <li><a href="{{route('roles.index')}}">View Role</a></li>
                            <li><a href="{{route('permissions.create')}}">Add Permission</a></li>
                            <li><a href="{{route('permissions.index')}}">View  Permission</a></li>
                        </ul>
                    </li>


                    <li class='has-sub'><a href='#'><img src="{{url('assets/img/application.png')}}" class="img-responsive"><span>Projects</span></a>
                        <ul>
                            <li><a href="{{route('projects.create')}}"><span>Add Projects</span></a></li>
                            <li class='last'><a href='{{route('projects.index')}}'><span>View Projects</span></a></li>
                        </ul>
                    </li>
                    <li class='has-sub'><a href='#'><img src="{{url('assets/img/application.png')}}" class="img-responsive"><span>Tasks</span></a>
                        <ul>
                            <li><a href="{{route('tasks.create')}}"><span>Add Tasks</span></a></li>
                            <li><a href="{{route('project_task')}}"><span>Selected Tasks</span></a></li>

                            <li class='last'><a href='{{route('tasks.index')}}'><span>All Tasks</span></a></li>
                        </ul>
                    </li>
                    <li class='has-sub'><a href='#'><img src="{{url('assets/img/application.png')}}" class="img-responsive"><span>Sub Tasks</span></a>
                        <ul>
                            <li><a href="{{route('sub_tasks_create')}}"><span>Add Sub Tasks</span></a></li>
                            <li><a href="{{route('project_task_select')}}"><span>Selected Sub Tasks</span></a></li>

                            <li class='last'><a href='{{route('sub_tasks_index')}}'><span>All Sub Tasks</span></a></li>
                        </ul>
                    </li>

                    @endif

                </ul>
            </div>

        </nav>
        <div class="content-wrapper student-info" >

            @yield('body')

        </div>
    </main> <!-- .cd-main-content -->



    <script type="text/javascript">

        ( function( $ ) {
            $( document ).ready(function() {
                $('#cssmenu > ul > li > a').click(function() {
                    $('#cssmenu li').removeClass('active');
                    $(this).closest('li').addClass('active');
                    var checkElement = $(this).next();
                    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                        $(this).closest('li').removeClass('active');
                        checkElement.slideUp('normal');
                    }
                    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                        $('#cssmenu ul ul:visible').slideUp('normal');
                        checkElement.slideDown('normal');
                    }
                    if($(this).closest('li').find('ul').children().length == 0) {
                        return true;
                    } else {
                        return false;
                    }
                });
            });
        } )( jQuery );
    </script>
</body>
</html>