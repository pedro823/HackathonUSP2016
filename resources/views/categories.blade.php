@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <h3>LISTA DE CATEGORIAS</h3>
                        @foreach ($categories as $category)
                            <p>
                            @if ($category->unlocked)<a href="{{ url('/category/'.$category->id) }}">{{ $category->name }}</a>
                            @else
                           {{ $category->name }}
                            @endif
                            </p>
                            <p>
                            @foreach ($points as $point)
                                @if ($point->id == $category->id)
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="{{round($point->user_total/$point->category_total*100)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round($point->user_total/$point->category_total*100)}}%;">
                                        {{round($point->user_total/$point->category_total*100)}}%
                                      </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
