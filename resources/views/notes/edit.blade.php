@extends('layout')

@section('content')
  <div class="col-sm-8">

      {!! Form::model($note, ['route' => ['notes.update', $note->id], 'method' => 'PUT']) !!}

        <legend>
          <a href="{{ URL::previous() }}" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-arrow-left"></span>
          </a>
          Editar Nota
        </legend>

        @include('fragment._error')

        @include('fragment._form')

        {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}

      {!! Form::close() !!}

  </div>
  <div class="col-sm-4">

  </div>
@endsection
