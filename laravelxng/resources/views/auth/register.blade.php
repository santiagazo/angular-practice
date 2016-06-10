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
                {!! Form::open( ['url' => '/register', 'class' => 'reg-page'] ) !!}
                    <div class="reg-header">
                        <h2>Register a new account</h2>
                        <p>Already Signed Up? Click <a href="{{ url('/login') }}" class="color-green">Sign In</a> to login your account.</p>
                    </div>
                    @include('errors.flash')
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label>I am a</label>
                        {!! Form::select('role', ['Both' => 'Buyer/Seller',
                                                  'Buyer' => 'Buyer',
                                                  'Seller' => 'Seller',
                                                  'Lender' => 'Lender',
                                                  'Realtor' => 'Realtor',
                                                  'Title Company' => 'Title Company',
                                                  'Inspector' => 'Inspector'], 'Both', ['class' => 'form-control']) !!}

                        @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <label>First Name</label>
                        {!! Form::text('firstname', null, ['class' => 'form-control margin-bottom-20']) !!}
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                        <label>Middle Name</label>
                        {!! Form::text('middlename', null, ['class' => 'form-control margin-bottom-20']) !!}
                        @if ($errors->has('middlename'))
                            <span class="help-block">
                                <strong>{{ $errors->first('middlename') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label>Last Name</label>
                                {!! Form::text('lastname', null, ['class' => 'form-control margin-bottom-20']) !!}
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group{{ $errors->has('suffix') ? ' has-error' : '' }}">
                                <label>Suffix</label>
                                {!! Form::select('suffix', [NULL,'I', 'II', 'III', 'IV', "V"], 'defaultItem', ['class' => 'form-control']) !!}
                                @if ($errors->has('suffix'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suffix') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label>Username</label>
                        {!! Form::text('username', null, ['class' => 'form-control margin-bottom-20']) !!}
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                        <label>Address Line 1</label>
                        {!! Form::text('address1', null, ['class' => 'form-control margin-bottom-20']) !!}
                        @if ($errors->has('address1'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address1') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                        <label>Address Line 2</label>
                        {!! Form::text('address2', null, ['class' => 'form-control margin-bottom-20']) !!}
                        @if ($errors->has('address2'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address2') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label>City</label>
                        {!! Form::text('city', null, ['class' => 'form-control margin-bottom-20']) !!}
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label>State</label>
                            {!! Form::text('state', null, ['class' => 'form-control margin-bottom-20']) !!}
                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                                <label>Zip</label>
                                {!! Form::text('zip', null, ['class' => 'form-control margin-bottom-20']) !!}
                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input type="checkbox" name='terms'>
                                I read <a href="#" class="color-green">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn-u" type="submit">Register</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!--/container-->
<!--=== End Content Part ===-->
</div>
@endsection
