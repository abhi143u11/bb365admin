<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') | BB365 - Brand Builder 365</title>
    <link rel="shortcut icon" href="{{ asset('/uploads/site-icon.png') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/css/halfmoon.min.css') }}" rel="stylesheet"> --}}


    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <!-- orris -->
    <link href="{{ asset('assets/css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <style>
        .nav-header {
            padding: 0px;
        }

        .navbar-static-side {
            background: #363f50;
        }

        .nav>li>a {
            color: #ffffff;
        }

        .nav>li.active {
            border-left: 4px solid #e31e24;
            border-right: 4px solid #e31e24;
            background: #fff;

        }

        .nav>li.active>a {
            color: #e31e24;
        }

        .HeaderLogo {
            text-align: left;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 10px;
            margin-right: 10px;

            text-align: left;
        }

        .modal-open .select2-container--open {
            z-index: 999999 !important;
            width: 100% !important;
        }
    </style>

</head>

<body class="pace-done body-small fixed-sidebar">

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">

            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header" style="background: #fff;">

                        <div class="dropdown profile-element ">
                            <div class="HeaderLogo">
                                <img alt="image" class="" src="{{url('uploads/bb365.png')}}" width="100%" />

                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="block m-t-xs font-bold"></span>
                                </a>
                            </div>
                        </div>
                        <div class="logo-element">

                        </div>
                        @if(Auth::user()->usertype=='admin')
                    <li class="{{'dashboard' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class="{{'imagesnew' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/imagesnew')}}"><i class="fa fa-th"></i> <span class="nav-label">Images</span></a>
                    </li>
                    <li class="{{'subcategories' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/subcategories')}}"><i class="fa fa-th"></i> <span class="nav-label">Sub Categories</span></a>
                    </li>
                    <!-- <li class="{{'bill' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/bill')}}"><i class="fa fa-files-o"></i> <span
                                class="nav-label">Bills</span></a>
                    </li>  -->

                    <li class="{{'users' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/users')}}"><i class="fa fa-users"></i> <span class="nav-label">Customers</span></a>

                    </li>


                    <!-- <li class="{{'bulkproducts' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/bulkproducts')}}"><i class="fa fa-pencil"></i> <span
                                class="nav-label">Price Update</span></a>
                    </li> 

                    <li class="{{'coupons' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/coupons')}}"><i class="fa fa-ticket"></i> <span
                                class="nav-label">Coupons</span></a>
                    </li>  

                    <li class="{{'recipes' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/recipes')}}"><i class="fa fa-cutlery"></i> <span
                                class="nav-label">Recipes</span></a>
                    </li> 

                    <li class="{{'blogs' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/blogs')}}"><i class="fa fa-rss-square"></i> <span
                                class="nav-label">Blogs</span></a>
                    </li>  -->

                    <!-- <li class="{{'videos' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/videos')}}"><i class="fa fa-video-camera"></i> <span
                                class="nav-label">Videos</span></a>
                    </li>  -->

                    <li class="{{'categories' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/categories')}}"><i class="fa fa-align-justify"></i> <span class="nav-label">Categories</span></a>
                    </li>

                    <!-- 
                    <li class="{{'insta' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/insta')}}"><i class="fa fa-instagram"></i> <span
                                class="nav-label">Instagram</span></a>
                    </li>  -->

                    @endif

                    @if(Auth::user()->usertype=='admin')
                    <li class="{{'coupons' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/coupons')}}"><i class="fa fa-ticket"></i> <span class="nav-label">Coupons</span></a>
                    </li>

                    <li class="{{'notification-message' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/notification-message')}}"><i class="fa fa-bell"></i> <span class="nav-label">Notifications</span></a>
                    </li>

                    <li class="{{'transaction' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/transaction')}}"><i class="fa fa-credit-card-alt"></i> <span class="nav-label">Transactions</span></a>
                    </li>

                    <li class="{{'subscriptions' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/subscriptions')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Subscriptions</span></a>
                    </li>



                    <li class="{{'pages' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/pages')}}"><i class="fa fa-file-text"></i> <span class="nav-label">Pages</span></a>
                    </li>

                    <!-- <li class="{{'customer/frame' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/customer/frame')}}"><i class="fa fa-file-video-o"></i> <span class="nav-label">Frames</span></a>
                    </li> -->

                    <li class="{{'mostdownloadcat' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/mostdownloadcat')}}"><i class="fa fa-download"></i> <span class="nav-label">Most Download Cat</span></a>
                    </li>

                    <li class="{{'setting' == request()->path() ? 'active' : ''}}">
                        <a href="{{url('/setting')}}"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span></a>
                    </li>


                    @endif
                    <li>
                        <a class="nav-label" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> <span class="nav-label">
                                {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " style="background:#363f50;;color:#fff;border-color:#363f50;" href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <div style="padding: 20px;font-size:18px;">
                        <span class="m-r-sm text-muted welcome-message">Welcome BB365 - Brand Builder 365</span>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>


            <div class="wrapper wrapper-content">



                <div class="panel-header panel-header-sm">
                </div>
                <div class="content">
                    @yield('content')

                </div>


            </div>
            <div class="footer">
                <div>
                    <strong>Copyright</strong> @php echo config('app.name');@endphp &copy; @php echo date('Y');@endphp.
                    <div class="pull-right">
                        Powered By <a href="https://www.beepixl.com" target="_blank">Bee Pixl</a></div>
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="toast toast-bootstrap hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="fa fa-newspaper-o"> </i>
            <strong class="mr-auto m-l-sm">Notification</strong>
            <small>2 seconds ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, you can push notifications to your visitors with this toast feature.
        </div>
    </div> --}}
    <!-- Mainly scripts -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/halfmoon.js') }}"></script> --}}
    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('assets/js/inspinia.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
    <!-- Morris -->
    <script src="{{ asset('assets/js/plugins/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/morris/morris.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/plugins/toastr/toastr.min.js') }}"></script> --}}
    <script>
        @if(Session('status'))
        swal({
            title: "{{ Session('status') }}",
            //text: "You clicked the button!",
            icon: "{{ Session('statuscode') }}",
            button: "OK",
        });
        @endif
    </script>
    <!-- iCheck -->
    <script src="{{ asset('assets/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('#myTable').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>


    @yield('scripts')
</body>

</html>