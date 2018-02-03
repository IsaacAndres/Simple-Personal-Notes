@extends('layout')

@section('content')
  <div class="col-sm-8">

      {!! Form::open(['route' => 'notes.store']) !!}

        <legend>
          <a href="{{ route('notes.index') }}" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-arrow-left"></span>
          </a>
          Nueva Nota
        </legend>

        @include('fragment._error')

        @include('fragment._form')

        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}

      {!! Form::close() !!}

  </div>
  <div class="col-sm-4">

  </div>
@endsection
