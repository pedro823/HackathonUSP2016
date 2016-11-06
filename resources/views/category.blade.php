@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>{{ $category->name }}</p>
                    <iframe width="560" height="315" src="{{ $category->video }}" frameborder="0" allowfullscreen></iframe>
                    <p>{{ $category->description }}</p>
                    <br><a href="{{ url('question?category='.$category->id) }}">PERGUNTAS!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection