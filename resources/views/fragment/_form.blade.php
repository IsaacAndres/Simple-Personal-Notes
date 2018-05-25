<div class="form-group">
  {!! Form::label('title', 'Título') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('content', 'Contenido') !!}
  {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('Grupo') !!}
  {!! Form::select('group_id', $groups, null, [
    'class' => 'form-control', 'placeholder' => 'Sin grupo'
  ]); !!}
</div>

<div class="form-group">
  {!! Form::hidden('important',0) !!}
  <label>{!! Form::checkbox('important', '1') !!} Es importante</label>
  </span>
</div>
