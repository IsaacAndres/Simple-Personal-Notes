<div class="form-group">
  {!! Form::label('title', 'Título') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('content', 'Contenido') !!}
  {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::hidden('important',0) !!}
  {!! Form::checkbox('important', '1') !!}
  {!! Form::label('important', ' Es importante') !!}
</div>
