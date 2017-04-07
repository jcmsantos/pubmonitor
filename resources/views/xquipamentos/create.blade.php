

@extends('master')

@section('equipamentos')
active
@endsection

@section('conteudo')

          <h2>Novo equipamento</h2>
<form method="POST" action="/equipamentos">
{{ csrf_field()}}
  <div class="form-group">
    <label for="Codigo">Numero</label>
    <input type="text" class="form-control" id="Codigo" name="codigo" placeholder="Codigo da equipamento">
  </div>

  <div class="form-group">
    <label for="Nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da equipamento">
  </div>


  <div class="form-group">
    <button type="submit" class="btn btn-default">Adicionar</button>
  </div>
  @include('erros')
</form>

@endsection('conteudo')
