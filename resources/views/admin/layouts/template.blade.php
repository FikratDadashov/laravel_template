<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>LARAVEL TEMPLATE - Admin</title>
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets\images\logo-icon.png')}}">--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('users/assets/images/favicon.svg')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('assets\libs\select2\dist\css\select2.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

    <link href="{{url('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('assets/libs/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{url('dist/css/style.min.css')}}" rel="stylesheet">

    <!-- Page specific CSS -->
    @yield('css')

    <link href="{{url('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="{{url('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}">

    {{--// dual list box css--}}
    <link rel="stylesheet" type="text/css"
          href="{{url('assets/libs/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css')}}">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">

    <header class="topbar">

        <nav class="navbar top-navbar navbar-expand-md navbar-dark">

            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <a class="navbar-brand" href="{{route('admin')}}">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                    {{--                        <img src="{{url('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" style="width: 50px">--}}
                    <!-- Light Logo icon -->
                        {{--                        <img src="{{url('assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" style="width: 50px">--}}
                    </b>
                    <div class="logo-text">
                        <span class="font-weight-bold text-dark">LARAVEL TEMPLATE</span>
                    </div>
                </a>
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                   aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                                                              href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
                                class="mdi mdi-menu font-24"></i></a></li>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">


                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="{{url('assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <span class="with-arrow"><span class="bg-primary"></span></span>
                            <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                                <div class=""><img src="{{url('assets/images/users/1.jpg')}}" alt="user" class="img-circle" width="60"></div>
                                <div class="ml-2">
                                    <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                    <p class=" mb-0">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="javascript:void(0)"
                                   onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    <i class="fa fa-power-off mr-1 ml-1"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>

    </header>

    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a href="{{url('admin/home')}}" class="sidebar-link">
                            <i class="fas fa-home"></i>
                            <span class="hide-menu"> <b>Ana səhifə </b></span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/language*')) active @endif"
                           href="{{url('admin/language')}}" aria-expanded="false">
                            <i class="fas fa-language"></i>
                            <span class="hide-menu"><b>Dil Məlumatları</b></span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/slide*')) active @endif"
                           href="{{url('admin/slide')}}" aria-expanded="false">
                            <i class="fas fa-ticket-alt"></i>
                            <span class="hide-menu"><b>Slaydlar</b></span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{url('admin/user')}}"
                        class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/users*')) active @endif">
                            <i class="fas fa-users"></i>
                            <span class="hide-menu"><b> İstifadəçilər</b></span>
                        </a>
                    </li>

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/car*')) active @endif" href="{{url('admin/car')}}" aria-expanded="false">--}}
{{--                            <i class="fas fa-car"></i>--}}
{{--                            <span class="hide-menu"><b>Maşınlar</b></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/category*')) active @endif" href="{{url('admin/category')}}" aria-expanded="false">--}}
{{--                            <i class="fas fa-list-ul"></i>--}}
{{--                            <span class="hide-menu"><b>Kateqoriyalar</b></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="sidebar-item">
                        <a href="{{url('admin/blog')}}"
                        class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/blog*')) active @endif">
                            <i class="fas fa-newspaper"></i>
                            <span class="hide-menu"><b> Bloglar</b></span>
                        </a>
                    </li>

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/message*')) active @endif"--}}
{{--                            href="{{url('admin/message')}}" aria-expanded="false">--}}
{{--                            <i class="fas fa-bookmark"></i><span class="hide-menu">Mesajlar</span>--}}
{{--                            @php($message_count = \App\Models\Message::query()->where('ready','0')->count())--}}
{{--                            @if($message_count > 0)--}}
{{--                                <span class="label label-rounded label-danger ml-auto">--}}
{{--                                        {{$message_count}}--}}
{{--                                    </span>--}}
{{--                            @endif--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/special_offers*')) active @endif"--}}
{{--                           href="{{url('admin/special_offers')}}" aria-expanded="false">--}}
{{--                            <i class="fa fa-gift"></i>--}}
{{--                            <span class="hide-menu"><b>Bonuslar</b></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/why_us*')) active @endif"--}}
{{--                           href="{{url('admin/why_us')}}" aria-expanded="false">--}}
{{--                            <i class="fa fa-gift"></i>--}}
{{--                            <span class="hide-menu"><b>Niyə Biz</b></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/steps*')) active @endif"--}}
{{--                           href="{{url('admin/steps')}}" aria-expanded="false">--}}
{{--                            <i class="fas fa-map-signs"></i>--}}
{{--                            <span class="hide-menu"><b>Steps</b></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    --}}



                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link  @if(request()->is('admin/testimonial*')) active @endif"
                           href="{{url('admin/testimonial')}}" aria-expanded="false">
                           <i class="fas fa-smile"></i>
                            <span class="hide-menu"><b>Müştəri Rəyləri</b></span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link  @if(request()->is('admin/service*')) active @endif"
                           href="{{url('admin/service')}}" aria-expanded="false">
                            <i class="fas fa-map-signs"></i>
                            <span class="hide-menu"><b>Servislər</b></span>
                        </a>
                    </li>

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link @if(request()->is('admin/about*')) active @endif"--}}
{{--                           href="{{url('admin/about')}}" aria-expanded="false">--}}
{{--                            <i class="fas fa-info"></i>--}}
{{--                            <span class="hide-menu"><b>Haqqımızda</b></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link  @if(request()->is('admin/setting*')) active @endif"
                           href="{{url('admin/setting')}}"
                           aria-expanded="false">
                            <i class="fas fa-cog"></i>
                            <span class="hide-menu"><b>Tənzimləmələr</b></span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link  @if(request()->is('admin/contact*')) active @endif"
                           href="{{url('admin/contact')}}"
                           aria-expanded="false">
                            <i class="fas fa-phone"></i>
                            <span class="hide-menu"><b>Əlaqə Məlumatları</b></span>
                        </a>
                    </li>

{{--                    <li class="sidebar-item">--}}
{{--                        <a class="sidebar-link waves-effect waves-dark sidebar-link  @if(request()->is('admin/content*')) active @endif"--}}
{{--                           href="{{url('admin/content')}}"--}}
{{--                           aria-expanded="false">--}}
{{--                            <i class="fas fa-clipboard-check"></i>--}}
{{--                            <span class="hide-menu"><b>Kontent</b></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                </ul>
            </nav>
        </div>
    </aside>

    <div class="page-wrapper">
        @include('admin.layouts.messages')
        @yield('content')
        <footer class="footer text-center">
        </footer>
    </div>

</div>

<div class="chat-windows"></div>

<script>
    function showMore() {
        var more = document.getElementById("more");
        var moreBtn = document.getElementById("moreBtn");

        if (more.style.display === "none") {
            moreBtn.value = "@lang('student/index.show_less')";
            more.style.display = "inline";
        } else {
            moreBtn.value = "@lang('student/index.show_more')";
            more.style.display = "none";
        }
    }

    function showStudents() {
        var myDiv = document.getElementById("studentsResults");
        myDiv.style.display = "inline";

    }

</script>

{{--TODO js code-larin importunu minimuma endirmek lazimdir. Hansi sehifede ne lazimdirsa oz sehifesinde daxil etmek daha yaxsi olar--}}
<script data-cfasync="false" src="{{url('scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<script src="{{url('dist/js/app.min.js')}}"></script>
<script src="{{url('dist/js/app.init.js')}}"></script>
<script src="{{url('dist/js/app-style-switcher.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{url('assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{url('dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{url('dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{url('dist/js/feather.min.js')}}"></script>
<script src="{{url('dist/js/custom.min.js')}}"></script>
<!--This page JavaScript -->


<script src="{{url('assets\libs\select2\dist\js\select2.full.min.js')}}"></script>
<script src="{{url('assets\libs\select2\dist\js\select2.min.js')}}"></script>
<script src="{{url('dist\js\pages\forms\select2\select2.init.js')}}"></script>

<!--Page specific JS-->
{{--TODO js-den basqa digerlerini yigisdirmaq lazimdir, bunlar hansi meqsedle yazilib?--}}
@yield('semester')
@yield('js')
@yield('statistics_ajax')


<!--This page plugins -->
<script src="{{url('assets\extra-libs\datatables.net\js\jquery.dataTables.min.js')}}"></script>
<script src="{{url('dist\js\pages\datatable\datatable-advanced.init.js')}}"></script>
<script src="{{url('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

{{--dual list box js--}}
<script src="{{url('assets/libs/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{url('dist/js/pages/forms/dual-listbox/dual-listbox.js')}}"></script>
<script src="{{url('assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('assets/libs/magnific-popup/meg.init.js')}}"></script>

<script src="{{url('assets/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
<script src="{{url('assets/js/pages/form-editor.init.js')}}"></script>

<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            setTimeout(function () {
                $('.alert-success').slideUp(300);
            }, 3000); // <-- time in milliseconds
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script>
    $("#show_update").click(function(){
        $("#show_update").attr('hidden',true);
        $("#remove_update").removeAttr('hidden');
        $("#password_section").removeAttr('hidden');
        $("#password").prop('required',true);
        $("#password_confirmation").prop('required',true);
        $("#statement").val("1");
    });

    $("#remove_update").click(function(){
        $("#show_update").removeAttr('hidden');
        $("#remove_update").attr('hidden',true);
        $("#password_section").attr('hidden',true);
        $("#password").prop('required',false);
        $("#password_confirmation").prop('required',false);
        $("#statement").val("0");
        $("#password").val("");
        $("#password_confirmation").val("");
    });

    $("#form_submit").click(function(){
        if ($("#statement").val() == "1"){
            return confirm("Do you want to update this user's password?");
        }
    });

</script>

</body>

</html>
