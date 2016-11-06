@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <b>LISTA DE CATEGORIAS</b>
                        @foreach ($categories as $category)
                            <p><a href="{{ url('/category/'.$category->id) }}">{{ $category->name }}</a></p>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
