<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Fav Icon  -->
<link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}">
<!-- Page Title  -->
<title>@yield('pageTitle')</title>

<!-- StyleSheets  -->
<link rel="stylesheet" href="{{ asset('/asset/css/dashlite.css?ver=2.9.0') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('/asset/css/theme.css?ver=2.9.0') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('/asset/css/fontawesome-all.css') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('/asset/css/style.css') }}">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="nk-body bg-white npc-general pg-auth">
<div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{ route('home') }}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ asset('asset/images/logo.png') }}" srcset="{{ asset('asset/images/logo.png') }}" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('asset/images/logo.png') }}" srcset="{{ asset('asset/images/logo.png') }}" alt="logo-dark">
                            </a>
                        </div>
                        <section class="nk-content container-fluid">
                            @yield('content')
                        </section>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>


<footer class="nk-footer">
<div class="container-fluid">
<div class="row">
<div class="col-12 text-center">
<p class="text-soft">&copy; 2022 {{ config('app.name') }}. All Rights Reserved.</p>
</div>
</div>
</div>
</footer>
<script src="{{ asset('/asset/js/bundle.js?ver=2.9.0') }}"></script>
<script src="{{ asset('/asset/js/scripts.js?ver=2.9.0') }}"></script>

<script src="{{ asset('/asset/js/formValidation.js') }}" type="text/javascript"></script> 
<script src="{{ asset('/asset/js/bootstrapfrm.js') }}" type="text/javascript"></script> 
@yield('scripts')
</body>
</html>
