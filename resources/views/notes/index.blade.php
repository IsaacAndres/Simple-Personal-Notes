@extends('layout')

@section('content')
  <div class="col-md-2">
    <h2>Grupos</h2>
      <ul class="list-group">
        <li class="list-group-item"><a href="/notes">Todas</a></li>
        @foreach ($groups as $group)
          <li class="list-group-item">
            <a href="/groups/{{$group->id}}/notes">{{ $group->name }}</a>
          </li>
        @endforeach
          <li class="list-group-item"><a href="{{ action('NotesWithoutGroupController@index') }}">Sin grupo</a></li>
          {{-- <li class="list-group-item"><a href="">Añadir grupo</a></li> --}}
      </ul>
  </div>

  <div class="col-md-8">
    <h2>
      Mis Notas
      <a href="{{ route('notes.create') }}" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span>
        Nueva
      </a>
    </h2>

    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th width="20px">Fecha</th>
          <th>Nota</th>
          <th>Grupo</th>
          <th colspan="3">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($notes as $note)
          <tr>
            <td>{{ $note->created_at->diffForHumans() }}</td>
            <td>
              <a href="{{ route('notes.show', $note->id) }}">
                <strong>
                  @if ($note->isImportant())
                    <span class="label label-warning">
                      <span class="glyphicon glyphicon-alert"></span>
                      Importante
                    </span>&nbsp;
                  @endif
                  {{ $note->title }}
                </strong>
                {{ str_limit($note->content, 60) }}
              </a>
            </td>
            <td>
              @if ($note->group == null)
                <label class="label label-default">Sin grupo</label>
              @else
                <label class="label label-default">{{ $note->group->name }}</label>
              @endif
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
              <form action="{{ route('notes.destroy', $note->id) }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                <button type="button" class="btn btn-danger btn-delete">
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

  <div class="col-md-2">
    @include('fragment._info')
  </div>
@endsection

@section('scripts')
  <script>
    $('.btn-delete').on('click', function(e) {
      swal({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        buttons: ["Cancelar", "Sí"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $(this).parents('form:first').submit();
        }s
      });
    });
  </script>
@endsection
