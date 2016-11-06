@extends('layouts.app')

<div id="body-login" style="background-color: #3F51B5">
    <div class="wrapper-center">
        <div class="flex-center">
            <div class="padded">
                <div class="login-title">
                    <h2>Login</h2>
                </div>
                <div class="login-form">
                    <form action="#">
                        <div class="mdl-textfield mdl-js-textfield login-container">
                            <input class="mdl-textfield__input" type="text">
                            <label class="mdl-textfield__label" for="sample1">Email</label>
                        </div>
                    </form>
                    <form action="#">
                        <div class="mdl-textfield mdl-js-textfield login-container">
                            <input type="password" class="mdl-textfield__input" type="text">
                            <label class="mdl-textfield__label" for="sample1">Senha</label>
                        </div>
                    </form>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Login</button>
                </div>
            </div>
        </div>
    </div>
    <script async defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</div>
