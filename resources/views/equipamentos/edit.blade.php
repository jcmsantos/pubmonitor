

@extends('master')

@section('equipamentos')
active
@endsection

@section('conteudo')

          <h2>editar equipamento</h2>
<form  action="/equipamentos/{{$equipamento->id}}" method="POST">
{{ csrf_field()}}
{{ method_field('PATCH') }}
  <div class="form-group">
    <label for="macAddress">macAddress</label>
    <input type="text" class="form-control" id="macAddress" name="macAddress" value="{{ $equipamento->macAddress }}" disabled>
  </div>
  <div class="form-group">
    <label for="IP">IP</label>
    <input type="text" class="form-control" id="ip" name="ip" value="{{ $equipamento->ip }}" disabled>
  </div>

  <div class="form-group">
    <label for="loja_id">Codigo</label>
    <select class="form-control" id="loja_id" name="loja_id">
      @foreach($lojas as $loja)
        <option value"{{$loja->id}}" 
          @if($loja->id == $equipamento->loja_id)
          selected
          @endif>{{$loja->nome}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="Nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$equipamento->nome}}" placeholder="Nome do equipamento">
  </div>


  <div class="form-group">
    <button type="submit" class="btn btn-default">Gravar</button>
  </div>
  @include('erros')
</form>

@endsection('conteudo')
