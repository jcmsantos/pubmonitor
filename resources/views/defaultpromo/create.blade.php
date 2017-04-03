

@extends('master')

@section('defaultpromo')
active
@endsection

@section('conteudo')

          <h2>Nova Promoção</h2>
<form method="POST" action="/defaultpromo" enctype="multipart/form-data">
{{ csrf_field()}}

  <div class="form-group">
    <label for="Nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da loja">
  </div>
  
  <div class="form-group">
    <label for="imagem">Imagem</label><br>
    <input type="file" id="imagem" name="imagem">
  </div>

  <div class="form-group">
    <label for="dtini">Data de inicio</label>
    <input type="text" class="form-control" id="dtini" name="inicio" placeholder="">
  </div>

  <div class="form-group">
    <label for="dtfim">Data de fim</label>
    <input type="text" class="form-control" id="dtfim" name="fim" placeholder="">
  </div>

<div class="form-group">
 <label for="dtfim">Data de fim</label><br>


  <label class="checkbox-inline"><input type="checkbox" name="dom" id="inlineCheckbox1" value="1" checked> Domingo </label>
  <label class="checkbox-inline"><input type="checkbox" name="seg" id="inlineCheckbox2" value="1" checked> 2ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="ter" id="inlineCheckbox3" value="1" checked> 3ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="qua" id="inlineCheckbox4" value="1" checked> 4ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="qui" id="inlineCheckbox5" value="1" checked> 5ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="sex" id="inlineCheckbox6" value="1" checked> 6ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="sab" id="inlineCheckbox7" value="1" checked> Sabado </label>
  
</div>


  <div class="form-group">
    <button type="submit" class="btn btn-default">Adicionar</button>
  </div>
  @include('erros')
</form>

@endsection('conteudo')

@section('scripts')
  <script>
  $( function() {
    $( "#dtini" ).datepicker({dateFormat: "yy-mm-dd"});
  } );
  </script>
  <script>
  $( function() {
    $( "#dtfim" ).datepicker({dateFormat: "yy-mm-dd"});
  } );
  </script>

@endsection('scripts')
