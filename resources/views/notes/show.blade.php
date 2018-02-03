@extends('layout')

@section('content')
  <div class="col-sm-8">
    <h2>
      <a href="{{ URL::previous() }}" class="btn btn-default btn-xs">
        <span class="glyphicon glyphicon-arrow-left"></span>
      </a>
      {{ $note->title }}
      <a href="{{ route('notes.edit', $note->id ) }}" class="btn btn-default btn-xs">
        <span class="glyphicon glyphicon-pencil"></span>
      </a>
    </h2>

    <p>{{ $note->content }}</p>
  </div>
  <div class="col-sm-4">

  </div>
@endsection
