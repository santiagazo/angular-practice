@extends('layouts.site.main')

@section('css')
    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ url('/assets/css/pages/page_log_reg_v1.css') }}">

    <style>
        .has-success .input-group-addon {
            color: #3c763d;
            background-color: #dff0d8;
            border-color:#3c763d;
        }

        .has-success .form-control {
            border-color: #3c763d;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        }
    </style>
@endsection

<!-- Main Content -->
@section('content')
<div class="login-background" style='background: #fbfbfb url({{ url('assets/images/banners/winter-bg.jpg') }}) no-repeat center center;
                                         -webkit-background-size: cover;
                                        -moz-background-size: cover;
                                        -o-background-size: cover;
                                        background-size: cover;'>
    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                {!! Form::open( ['url' => '/password/email', 'class' => 'reg-page'] ) !!}
                    <div class="reg-header">
                        <h2>Reset your Password</h2>
                    </div>
                    <div class="form-group margin-bottom-20{{ $errors->has('email') ? ' has-error' : '' }} {{ Session::get('flash_notification.level') == 'success' ? ' has-success' : NULL }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" placeholder="Email" name='email' class="form-control">
                        </div>
                        @if (Session::has('flash_notification.message'))
                            @if( Session::get('flash_notification.level') == 'success')
                                <span class="text-{{ Session::get('flash_notification.level') }}">
                                    <strong>{!! Session::get('flash_notification.message') !!}</strong>
                                </span>
                            @endif
                        @endif
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-offset-6 col-md-6">
                            <button class="btn-u pull-right" type="submit">Reset</button>
                        </div>
                    </div>

                    <hr>

                    <h4>Just Remembered your Password?</h4>
                    <p>No worries, <a class="color-green" href="{{ url('/login') }}">click here</a> to return to the login screen.</p>
                {!! Form::close() !!}
            </div>
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->
</div>

@endsection

