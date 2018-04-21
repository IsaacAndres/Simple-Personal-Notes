@extends('layout')

@section('content')
  {{-- <div class="col-md-2">
    <h2>Grupos</h2>
      <ul class="list-group">
        <li class="list-group-item"><a href="/notes">Todas</a></li>
        @foreach ($groups as $group)
          <li class="list-group-item">
            <a href="/groups/{{$group->id}}/notes">{{ $group->name }}</a>
          </li>
        @endforeach
          <li class="list-group-item"><a href="{{ action('NotesWithoutGroupController@index') }}">Sin grupo</a></li>
          <li class="list-group-item"><a href="">Añadir grupo</a></li>
      </ul>
  </div> --}}

  <div class="col-md-10">
    <h2>Mis Grupos</h2>
    {!! Form::open(['route' => 'groups.store', 'class' => 'form-inline pull-right']) !!}
    <div class="input-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nuevo grupo']) !!}
        <span class="input-group-btn">
          {!! Form::submit('Agregar', ['class' => 'btn btn-success']) !!}
        </span>
    </div>
    {!! Form::close() !!}

    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Grupo</th>
          <th colspan="2">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($groups as $group)
          <tr>
            <td><strong>{{ $group->name }}</strong></td>
            <td>
              <a class="btn btn-default pull-right" data-toggle="modal" data-target="#updateGroup{{ $group->id }}">
                <span class="glyphicon glyphicon-pencil"></span>
              </a>
            </td>
            <td>
              {!! Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'delete']) !!}
              <form action="{{ route('notes.destroy', $group->id) }}" method="post">
                <button type="button" class="btn btn-danger btn-delete">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! $groups->render() !!}
  </div>

  @foreach ($groups as $group)
    <div class="modal fade" id="updateGroup{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editar Grupo</h4>
          </div>
          <div class="modal-body">
            {!! Form::model($group, ['route' => ['groups.update', $group->id], 'method' => 'PUT']) !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
          <div class="modal-footer">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              {!! Form::submit('Cerrar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])!!}
              {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <div class="col-md-2">
    @include('fragment._error')
    @include('fragment._info')
  </div>
@endsection

@section('scripts')
  <script>
    $('.btn-delete').on('click', function(e) {
      swal({
        title: "Se borraran todas las notas asociadas a este grupo.",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        buttons: ["Cancelar", "Borrar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $(this).parents('form:first').submit();
        }
      });
    });
  </script>
@endsection
