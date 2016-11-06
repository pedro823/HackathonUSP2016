@extends('layouts.app')

@section('content')
<section class="conteudo">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div id="painel">
                    <div class="panel-heading">
                        <h3>
                            {{ $category->name }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p>{{ $category->description }}</p>
                        <p>{{ $category->video }}</p>
                        <br><a href="{{ url('question?category='.$category->id) }}">PERGUNTAS!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
