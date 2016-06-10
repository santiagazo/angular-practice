<!DOCTYPE html>
<html>
    <head>
        <title>{{ Config::get('settings.sitename') }}</title>
        <base href="./">
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Social Media Realtor Website">
        <meta name="author" content="Jay Lara - InnovationGuys.com">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- Web Fonts -->
        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

        <!-- CSS Global Compulsory -->
        <link rel="stylesheet" href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">

        <!-- CSS Header and Footer -->
        <link rel="stylesheet" href="{{ url('assets/css/headers/header-default.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/footers/footer-v1.css') }}">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ url('assets/plugins/animate.css') }}">
        <link rel="stylesheet" href="{{ url('assets/plugins/line-icons/line-icons.css') }}">
        <link rel="stylesheet" href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/plugins/parallax-slider/css/parallax-slider.css') }}">
        <link rel="stylesheet" href="{{ url('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/sweetalert-master/dist/sweetalert.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/sweetalert-master/themes/google/google.css') }}">

        <!-- CSS Theme -->
        <link rel="stylesheet" href="{{ url('assets/css/theme-colors') }}{{$theme_color ? "/".$theme_color.".css" : "/dark-blue.css"}}">
        <link rel="stylesheet" href="{{ url('assets/css/theme-skins/dark.css') }}">

        <!-- CSS Customization -->
        <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">


        <!-- Load libraries -->
        <!-- IE required polyfills, in this exact order -->
        {{ Html::script('es6-shim/es6-shim.min.js') }}
        {{ Html::script('zone.js/dist/zone.js') }}
        {{ Html::script('reflect-metadata/Reflect.js') }}
        {{ Html::script('systemjs/dist/system.src.js') }}
        {{ Html::script('systemjs.config.js') }}
     <!--
        {{ Html::script('@angular/es6/dev/src/testing/shims_for_IE.js') }}
        {{ Html::script('@angular/bundles/angular2-polyfills.js') }}
        {{ Html::script('systemjs/dist/system.js') }}
        {{ Html::script('rxjs/bundles/Rx.js') }}
        {{ Html::script('angular2/bundles/angular2.dev.js') }}
        {{ Html::script('angular2/bundles/router.dev.js') }}
        {{ Html::script('angular2/bundles/http.dev.js') }}

        {{ Html::script('js/d3.min.js') }}
        {{ Html::script('js/c3.min.js') }}-->
        {{ Html::script('js/scripts.js') }} <!-- included for jquery -->
    <!--
        <script>
            System.config({
                "defaultJSExtensions": true,
                packages: {
                    app: {
                        format: 'register',
                        defaultExtension: 'js'
                    }
                }
            });

            System.import('js/boot')
                    .then(null, console.error.bind(console));
        </script>
        -->
        <script>
        System.config({
                "defaultJSExtensions": true,
                packages: {
                    app: {
                        format: 'register',
                        defaultExtension: 'js'
                    }
                }
            });
          System.import('js/boot')
                    .then(null, console.error.bind(console));
        </script>
    </head>
    <body>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container-fluid {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content-fluid {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
        <div class="container-fluid">
            <div class="content-fluid">
                <img src="{{ url('images/logos/bw-logo-big.png') }}" alt="">
                <h2>Loading...</h2>
            </div>
        </div>
    </body>
</html>
