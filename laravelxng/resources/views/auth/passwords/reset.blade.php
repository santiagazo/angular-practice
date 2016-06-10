@extends('layouts.site.main')

@section('css')
    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ url('assets/css/pages/page_log_reg_v1.css') }}">
@endsection

@section('content')
<div class="register-background" style="background:
                                        #fbfbfb
                                        url({{ url("assets/images/banners/arches-bg.jpg") }})
                                        center center no-repeat fixed;
                                        -webkit-background-size: cover;
                                        -moz-background-size: cover;
                                        -o-background-size: cover;
                                        background-size: cover;">
<!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                {!! Form::open( ['url' => '/password/reset', 'class' => 'reg-page'] ) !!}
                <input type="hidden" name="token" value="{{ $token }}">
                    <div class="reg-header">
                        <h2>Reset your Password</h2>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control margin-bottom-20']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">

                        <div class="col-lg-12 text-right">
                            <button class="btn-u" type="submit">Reset</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!--/container-->
<!--=== End Content Part ===-->
</div>
@endsection
