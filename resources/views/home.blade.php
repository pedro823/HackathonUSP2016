@extends('layouts.app')

@section('content')
<section class="conteudo">
  <div id="painel" class="wrapper-center">
      <form action="#">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 50%">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?">
              <label class="mdl-textfield__label" for="sample4">nº USP</label>
              <span class="mdl-textfield__error">Erro - não é um número!</span>
          </div>
      </form>
      <form action="#">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 50%">
              <input class="mdl-textfield__input" type="text">
              <label class="mdl-textfield__label" for="sample3">Curso</label>
          </div>
      </form>
      <a href="{{ url('/categories') }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Enviar</a>
  </div>
</section>
@endsection
