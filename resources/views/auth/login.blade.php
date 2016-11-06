@extends('layouts.app')

@section('content')
<div id="body-login" style="background-color: #3F51B5">
    <div class="wrapper-center">
        <div class="flex-center">
            <div class="padded">
                <div class="login-title">
                    <h2>Login</h2>
                </div>
                <div class="login-form">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="mdl-textfield mdl-js-textfield login-container">
                                <input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ old('email') }}" required autofocus>
                                <label class="mdl-textfield__label" for="sample1">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="mdl-textfield mdl-js-textfield login-container">
                                <input id="password" class="mdl-textfield__input" type="password" name="password" required>
                                <label class="mdl-textfield__label" for="sample1">Senha</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script async defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</div>

@endsection
