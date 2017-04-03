

@extends('master')

@section('defaultpromo')
active
@endsection

@section('conteudo')

          <h2>Editar Promoção - {{$defaultpromo->nome}}</h2>
<form method="POST" action="/defaultpromo/{{$defaultpromo->id}}" enctype="multipart/form-data">
{{ csrf_field()}}
{{ method_field('PATCH') }}
  <div class="form-group">
    <label for="Nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$defaultpromo->nome}}" @if($defaultpromo->id==1) disabled @endif >
  </div>
  
  

  <div class="form-group">
    <label for="imagem" >Imagem</label><br>
    <img src="/promo/img/{{$defaultpromo->caminho}}" height="200" width="%" ><br><br>
    <input type="file" id="imagem" name="imagem">
  </div>

  <div class="form-group">
    <label for="dtini">Data de inicio</label>
    <input type="text" class="form-control" id="dtini" name="inicio" value="{{ $defaultpromo->inicio }}" @if($defaultpromo->id==1) disabled @endif >
  </div>

  <div class="form-group">
    <label for="dtfim">Data de fim</label>
    <input type="text" class="form-control" id="dtfim" name="fim" value="{{$defaultpromo->fim}}" @if($defaultpromo->id==1) disabled @endif >
  </div>
 @if($defaultpromo->id<>1) 
<div class="form-group">
 <label for="dtfim">Data de fim</label><br>


  <label class="checkbox-inline"><input type="checkbox" name="dom" id="inlineCheckbox1" value="1" @if($defaultpromo->dom) checked @endif> Domingo </label>
  <label class="checkbox-inline"><input type="checkbox" name="seg" id="inlineCheckbox2" value="1" @if($defaultpromo->seg) checked @endif > 2ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="ter" id="inlineCheckbox3" value="1" @if($defaultpromo->ter) checked @endif > 3ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="qua" id="inlineCheckbox4" value="1" @if($defaultpromo->qua) checked @endif > 4ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="qui" id="inlineCheckbox5" value="1" @if($defaultpromo->qui) checked @endif > 5ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="sex" id="inlineCheckbox6" value="1" @if($defaultpromo->sex) checked @endif > 6ª feira </label>
  <label class="checkbox-inline"><input type="checkbox" name="sab" id="inlineCheckbox7" value="1" @if($defaultpromo->sab) checked @endif > Sabado </label>
  
</div>
@endif 

  <div class="form-group">
    <button type="submit" class="btn btn-default">Gravar</button>
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
