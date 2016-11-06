@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>{{ $question->question }}</p>
                    <p>{{ $question->info }}</p>
                    <p>Pontos q esta questão vale: {{ $question->points }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
