<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Aprendética">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Title -->
  <title>{{ config('app.name', 'Aprendética') }}</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="HackathonUSP2016/public/images/favicon/apple-touch-icon.png?v=1">
  <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png?v=1" sizes="32x32">
  <link rel="icon" type="image/png" href="images/favicon/favicon-194x194.png?v=1" sizes="194x194">
  <link rel="icon" type="image/png" href="images/favicon/android-chrome-192x192.png?v=1" sizes="192x192">
  <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png?v=1" sizes="16x16">
  <link rel="manifest" href="images/favicon/manifest.json?v=1">
  <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg?v=1" color="#3f51b5">
  <link rel="shortcut icon" href="images/favicon/favicon.ico?v=1">
  <meta name="apple-mobile-web-app-title" content="Aprend&eacute;tica">
  <meta name="application-name" content="Aprend&eacute;tica">
  <meta name="msapplication-config" content="images/favicon/browserconfig.xml?v=1">
  <meta name="theme-color" content="#3f51b5">

  <!-- Styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-cyan.min.css"/>
  <link rel="stylesheet" href="/css/materialize.css">
  <link href="/css/styles.css" rel="stylesheet">
  <link href="/css/login.css" rel="stylesheet">

  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
    ]); ?>
  </script>
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
<div id="app" class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

  <!-- Header -->
  <header class="header-bar mdl-layout__header mdl-layout__header--waterfall">
    <div class="mdl-layout__header-row">
    <!-- Title -->
    @if (Auth::guest())
      <a href="{{ url('/login') }}" class="title-container">
    @else
      <a href="{{ url('/categories') }}" class="title-container">
    @endif
      <img class="logo-image" src="/images/logo/logo.svg">
      <div>
        <span class="title-text">{{ config('app.name', 'Aprendética') }}</span>
      </div>
    </a>
    <div class="mdl-layout-spacer"></div>
      @if (Auth::guest())
        <a class="mdl-navigation__link" href="{{ url('/login') }}">Login</a>
        <a class="mdl-navigation__link" href="{{ url('/register') }}">Register</a>
      @else
        <a class="waves-effect waves-light dropdown-button btn" href='#' data-activates='dropLogout'>
          <i class="material-icons right">expand_more</i><span class="hidden-cell">{{ Auth::user()->name }}</span>
        </a>
        <ul id='dropLogout' class='dropdown-content'>
          <li>
            <a href="{{ url('/logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      @endif
    </div>
  </header>

  <!-- Content -->
  <main class="main mdl-layout__content">
    @yield('content')

    <!-- Footer -->
    <footer class="mdl-mega-footer">
      <div class="mdl-mega-footer--middle-section">
        <ul class="mdl-mega-footer--link-list">
          <li><a href="https://github.com/breno-helf" class="footer-link">Breno Helfstein Moura</a></li>
          <li><a href="https://github.com/caiolopes" class="footer-link">Caio Lopes</a></li>
          <li><a href="https://github.com/pedro823" class="footer-link">Pedro Leyton Pereira</a></li>
          <li><a href="https://github.com/RaphaelRGusmao" class="footer-link">Raphael dos Reis Gusmão</a></li>
        </ul>
      </div>
      <div class="mdl-mega-footer--bottom-section">
        <a href="https://github.com/pedro823/HackathonUSP2016">
          <img class="svg social-icon" src="/images/icons/github.svg"/>
        </a>
      </div>
      <div class="footer-left">
        <a href="http://www5.usp.br/">
          <img class="svg footer-icon" src="/images/icons/usp.svg"/>
        </a>
        <a href="https://www.ime.usp.br/">
          <img class="svg footer-icon" src="/images/icons/ime.svg"/>
        </a>
      </div>
    </footer>
  </main>
</div>

<!-- Scripts -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
<script src="/js/materialize.js"></script>
<script src="/js/scripts.js"></script>
<script src="/js/app.js"></script>

</body>
</html>
