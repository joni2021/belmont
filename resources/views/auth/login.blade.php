<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Prestamos</title>

    <base href="{{asset('/')}}">

    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    @include('layouts.css')
</head>

<body>
<!-- Pre-loader start -->
{{--<div class="theme-loader">--}}
    {{--<div class="ball-scale">--}}
        {{--<div class='contain'>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
            {{--<div class="ring">--}}
                {{--<div class="frame"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- Pre-loader end -->

<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->

                <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h1 class="text-center belmont-title text-dark pb-0  mb-0">Belmont</h1>
                                    <h2 class="h5 text-center pt-0">
                                        <small class="text-secondary pt-0">Ingresar</small>
                                    </h2>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="user" value="{{ old('user') }}" class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" required="" placeholder="Ingrese su usuario">

                                @if($errors->has('user'))
                                    <span class="form-bar">
                                        <small class="j-error-view text-danger">{{ $errors->get('user')[0] }}</small>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required="" placeholder="************">
                                @if ($errors->has('password'))
                                    <span class="form-bar">
                                        <small class="j-error-view text-danger">{{ $errors->get('password')[0] }}</small>
                                    </span>
                                @endif
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary d-">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Recordarme</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-facebook btn-md btn-block waves-effect waves-light text-center m-b-20">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- j-pro js -->
<script type="text/javascript" src="assets/pages/j-pro/js/jquery.ui.min.js"></script>
<script type="text/javascript" src="assets/pages/j-pro/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="assets/pages/j-pro/js/jquery.j-pro.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="bower_components/modernizr/js/css-scrollbars.js"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript"
        src="bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/j-pro/js/custom/login-form.js"></script>

<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vartical-layout.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>

</body>

</html>
