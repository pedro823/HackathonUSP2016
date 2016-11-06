@extends('layouts.app')

@section('content')
<section class="categorias-page">

  <h4>Categorias</h4>

  <ul class="collapsible popout" data-collapsible="accordion">
      @foreach ($categories as $category)
        <li>
          <div class="collapsible-header"><i class="material-icons">brightness_1</i>{{ $category->name }}</div>
          <div class="collapsible-body">
              @foreach ($points as $point)
                  @if ($point->id == $category->id)
                      {{round($point->user_total/$point->category_total*100)}}
                  @endif
              @endforeach
            <iframe width="560" height="315" src="{{ $category->video }}?rel=0;theme=light;color=white&cc_lang_pref=pt&cc_load_policy=1" frameborder="0" allowfullscreen></iframe>
            <p class="paragrafo">{{ $category->description }}</p>
            <div class="wrapper-center"><a href="{{ url('question?category='.$category->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">PERGUNTAS</a></div>
          </div>
        </li>
      @endforeach
    </ul>

</section>
@endsection
