@extends('layouts.app')

@section('content')
<div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" height="100" width="100" src="{{asset('assets/images/pome.png')}}" alt="...">
            <h2 class="brand-text font-size-18">Remark</h2>
          </div>
          <form method="post" action="{{ route('register') }}">
            @csrf

            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control empty" id="inputName" name="name">
              <label class="floating-label" for="inputName">Name</label>
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

              <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control empty" id="Company" name="Company">
              <label class="floating-label" for="Company">Company</label>
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="email" class="form-control empty{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autofocus>
              <label class="floating-label" for="inputEmail">Email</label>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control empty {{ $errors->has('password') ? ' is-invalid' : '' }}" id="inputPassword" name="password" required>
              <label class="floating-label" for="inputPassword">Password</label>
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group form-material floating" data-plugin="formMaterial">
                <label class="floating-label" for="inputPassword">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group clearfix">
              <div class="checkbox-custom checkbox-inline checkbox-primary pull-xs-left">
                <input type="checkbox" id="inputCheckbox" name="remember">
                <label for="inputCheckbox">Remember me</label>
              </div>
              <a class="pull-xs-right" href="forgot-password.html">Forgot password?</a>
            </div>

            <button type="Submit" class="btn btn-block btn-success waves-effect">Sign Up</button>
          </form>
          <p>Have account already? Please go to <a href="{{route('login')}}">Sign In</a></p>
        </div>
      </div>
      <footer class="page-copyright page-copyright-inverse">
        <p>Template BY amazingSurge</p>

        <p>© 2017. All RIGHT RESERVED.</p>
      </footer>
    </div>
  </div>
@endsection
