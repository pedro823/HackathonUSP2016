@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                @if(!isset($correct))
                    <p>{{ $question->question }}</p>
                    <form role="form" method="POST" action="{{ url('/question') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="category" value="{{app('request')->input('category')}}">
                        <input type="hidden" name="question" value="{{$question->id}}">
                        @foreach ($options as $option)
                            <input type="radio" name="option" value="{{ $option->id }}"> {{ $option->text }}
                            <br>
                        @endforeach
                        <button type="submit" class="btn btn-primary">
                            Responder
                        </button>
                    </form>
                @else
                    @if($correct)
                        <p>Você acertou!</p>
                    @else
                        <p>Você errou!</p>
                    @endif
                {{ $question->info }}
                      <p><a href="{{ url('/question?category='.app('request')->input('category'))."&q=".app('request')->input('q') }}"><button class="btn btn-primary">
                            Próxima questão
                      </button></a></p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
