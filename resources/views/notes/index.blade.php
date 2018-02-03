@extends('layout')

@section('content')
  <div class="col-sm-8">
    <h2>
      Mis Notas
      <a href="{{ route('notes.create') }}" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span>
        Nueva
      </a>
    </h2>

    @include('fragment._info')

    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th width="20px">Fecha</th>
          <th>Nota</th>
          <th colspan="3">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($notes as $note)
          <tr>
            <td>{{ $note->created_at->format('d/m/Y') }}</td>
            <td>
              <a href="{{ route('notes.show', $note->id) }}">
                <strong>
                  @if ($note->isImportant())
                    <span class="label label-warning">
                      <span class="glyphicon glyphicon-alert"></span>
                      Importante
                    </span>
                  @endif
                  {{ $note->title }}
                </strong>
                {{ str_limit($note->content, 60) }}
              </a>
            </td>
            <td>
              <a href="{{ route('notes.show', $note->id) }}" class="btn btn-link">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>
            <td>
              <a href="{{ route('notes.edit', $note->id ) }}" class="btn btn-default">
                <span class="glyphicon glyphicon-pencil"></span>
              </a>
            </td>
            <td>
              <form class="" action="{{ route('notes.destroy', $note->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! $notes->render() !!}
  </div>

  <div class="col-sm-4">
    @include('fragment._aside')
  </div>
@endsection
