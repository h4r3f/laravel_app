@extends('installer')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/skins/square/blue.css">
@stop

@section('content')
<div class="login-box">
      <div class="login-logo">
        <a href="/"><b>0</b> EffortThemes</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login to Admin Panel</p>
        <form method="POST" action="{!! url('/login'); !!}">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox" name="remember"> Remember Me
                    </label>
                  </div>
                    <a href="{!! url('/password/email'); !!}"> Reset Password </a> 
                </div><!-- /.col -->
                <div class="col-xs-6">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                   
                </div><!-- /.col -->
              </div>
        </form>
        @include('common.errors')
    </div>
</div>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/icheck.min.js" type="text/javascript"></script>

    <script>
        $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
        });
    </script>
@stop