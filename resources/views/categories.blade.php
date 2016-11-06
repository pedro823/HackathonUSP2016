@extends('layouts.app')

@section('content')
<section class="categorias-page">

  <h4>Categorias</h4>

  <ul class="collapsible popout" data-collapsible="accordion">
      @foreach ($categories as $category)
        <li>
          <div class="collapsible-header"><i class="material-icons">brightness_1</i>{{ $category->name }}</div>
          <div class="collapsible-body">
            <iframe width="560" height="315" src="{{ $category->video }}?rel=0;theme=light;color=white&cc_lang_pref=pt&cc_load_policy=1" frameborder="0" allowfullscreen></iframe>
            <p class="paragrafo">{{ $category->description }}</p>
          </div>
        </li>
      @endforeach
    </ul>

</section>
@endsection
