@extends('layouts.site.main')

@section('title')
    Login
@endsection

@section('css')
<!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ url('assets/css/pages/page_log_reg_v1.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pages/brand-buttons-inversed.css') }}">

@endsection

@section('content')
<div class="login-background" style='background: #fbfbfb url({{ url('assets/images/banners/water-bg.jpg') }})
                                        no-repeat center center;
                                        -webkit-background-size: cover;
                                        -moz-background-size: cover;
                                        -o-background-size: cover;
                                        background-size: cover;'>
    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                {!! Form::open( ['url' => '/login', 'class' => 'reg-page'] ) !!}
                    <div class="reg-header">
                        <h2>Login to your account</h2>
                    </div>
                    <button class="btn btn-lg btn-block btn-default login-option margin-bottom-10 open-collapsable-block"><span class="text-muted">via Social Media</span></button>
                    <div class="collapsable-block social-login margin-bottom-10" style="">
                        @if (Session::has('flash_notification.message'))
                            @if (Session::has('flash_notification.overlay'))
                                @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
                            @else
                                <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                    {!! Session::get('flash_notification.message') !!}
                                </div>
                            @endif
                        @endif
                        <a href="{{ url('auth/redirect/facebook') }}" class="btn btn-block btn-facebook-inversed">
                            <i class="fa fa-facebook"></i> Facebook
                        </a>
                        <a href="{{ url('auth/redirect/twitter') }}" class="btn btn-block btn-twitter-inversed">
                            <i class="fa fa-twitter"></i> Twitter
                        </a>
                        <a href="{{ url('auth/redirect/google') }}" class="btn btn-block btn-googleplus-inversed">
                            <i class="fa fa-google-plus"></i> Google+
                        </a>
                        <a href="{{ url('auth/redirect/linkedin') }}" class="btn btn-block btn-linkedin-inversed">
                            <i class="fa fa-linkedin"></i> LinkedIn
                        </a>
                    </div>
                    <button class="btn btn-lg btn-block btn-default login-option margin-bottom-10"><span class="text-muted">via {{ Config::get('settings.sitename') }}</span></button>
                    <div class="collapsable-block native-login margin-bottom-10" style="display: none">
                        <div class="form-group margin-bottom-20{{ $errors->has('username') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" placeholder="Username" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group margin-bottom-20{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" placeholder="Password" name='password' class="form-control" value="{{ old('password') }}">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 checkbox">
                                <label><input type="checkbox" name="remember"> Remember Me</label>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-u pull-right" type="submit">Login</button>
                            </div>
                        </div>

                        <hr>

                        <h4>Forget your Password ?</h4>
                        <p>No worries, <a class="color-green" href="{{ url('/password/reset') }}">click here</a> to reset your password.</p>
                    </div>
                {!! Form::close() !!}
            </div>
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->
</div>

@endsection

@section('js')

    <script>

        $(function(){
            $('body').on('click', '.login-option', function(e){
                e.preventDefault();
                $('.collapsable-block').hide('slide');
                if($(this).hasClass('open-collapsable-block')){
                    $(this).removeClass('open-collapsable-block').next().hide('slide');
                }else{
                    $('.login-option').removeClass('open-collapsable-block');
                    $(this).addClass('open-collapsable-block').next().toggle('slide');
                }
            })

            if( {{ $errors->has('username') ? 'true' : 'false' }} || {{ $errors->has('password') ? 'true' : 'false' }} ){
                $('.collapsable-block').hide();
                $('.login-option').removeClass('open-collapsable-block');
                $('.collapsable-block').eq(1).addClass('LKJASDFKASDFJKASDFLKJ').show().prev().addClass('open-collapsable-block');

            }
        });

    </script>

@stop
