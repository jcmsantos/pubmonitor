

@extends('master')

@section('lojas')
active
@endsection

@section('conteudo')

          <h2>Nova Loja</h2>
<form method="POST" action="/lojas">
{{ csrf_field()}}
  <div class="form-group">
    <label for="Codigo">Numero</label>
    <input type="text" class="form-control" id="Codigo" name="codigo" placeholder="Codigo da loja">
  </div>

  <div class="form-group">
    <label for="Nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da loja">
  </div>


  <div class="form-group">
    <button type="submit" class="btn btn-default">Adicionar</button>
  </div>
  @include('erros')
</form>

@endsection('conteudo')
