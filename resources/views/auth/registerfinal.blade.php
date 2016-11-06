@extends('layout.app')

@section('content')
<div id="bg">
    <div class="wrapper-center">
        <div class="flex-center">
            <div class="padded">
                <div class="login-title">
                    <h2>Registrar-se</h2>
                </div>
                <div class="login-form">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="mdl-textfield mdl-js-textfield login-container">
                            <input class="mdl-textfield__input" type="text">
                            <label class="mdl-textfield__label" for="sample1">E-Mail</label>
                        </div>
                    </form>
                    <form action="#">
                        <div class="mdl-textfield mdl-js-textfield login-container">
                            <input type="password" class="mdl-textfield__input" type="text">
                            <label class="mdl-textfield__label" for="sample1">Senha</label>
                        </div>
                    </form>
                    <form action="#">
                        <div class="mdl-textfield mdl-js-textfield login-container">
                            <input type="password" class="mdl-textfield__input" type="text">
                            <label class="mdl-textfield__label" for="sample1">Repetir senha</label>
                        </div>
                    </form>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
