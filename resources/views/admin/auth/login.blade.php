<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>
        @if(env('APP_ENV') == 'local')
            LOCAL
        @elseif(env('APP_ENV') == 'production')
            @lang('layouts/template.title')
        @endif
    </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/images/logo-icon.png')}}">
    <!-- Custom CSS -->
    <link href="{{url('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('dist/css/style.min.css')}}" rel="stylesheet">

    <link href="{{url('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
</head>

<body>
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../../assets/images/background/admin-bg.jpg); background-size: 100%">
        <div class="auth-box">
            <div id="login">
                <div class="logo">
{{--                    <img src="{{url('assets/images/logo-icon.png')}}" alt="logo">--}}
                    <h3 class="font-medium mb-3 mt-3">Admin</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    @if($errors->has('username'))
                        <div class="col-12">
                            <div class="alert alert-danger">
                                {{$errors->first('username')}}
                            </div>
                        </div>
                    @endif

                    <div class="col-12">
                        <form class="form-horizontal mt-3 needs-validation" id="login" action="{{ route('login') }}"  method="post" novalidate>
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email" required>
                                <div class="invalid-feedback">
                                    Doldurulmalıdır
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-lock"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" placeholder="Şifrə" name="password" id="password" minlength="8" required>
                                <div class="invalid-feedback">
                                    Doldurulmalıdır
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <div class="col-xs-12 pb-3">
                                    <button class="btn btn-block btn-lg btn-info" type="submit">Login</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            let forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>

</html>


{{--@if($errors->any())--}}
{{--    <ul>--}}
{{--        {!! implode('', $errors->all('<li>:message</li>'))  !!}--}}
{{--    </ul>--}}
{{--@endif--}}
{{--<form action="{{url('authenticate')}}"  method="post">--}}
{{--    @csrf--}}
{{--    <input type="text" name="username" id="username">--}}
{{--    <input type="password" name="password" id="password">--}}
{{--    <input type="submit" value="login">--}}
{{--</form>--}}
