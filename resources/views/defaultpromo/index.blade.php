

@extends('master')

@section('defaultpromo')
active
@endsection

@section('conteudo')
          <h2>Promoções</h2>
          <div class="table-responsive">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>imagem</th>
                  <th>Ínicio</th>
                  <th>Fim</th>
                  <th>Dom</th>
                  <th>2ª</th>
                  <th>3ª</th>
                  <th>4ª</th>
                  <th>5ª</th>
                  <th>6ª</th>
                  <th>Sabado</th>
                </tr>
              </thead>
              <tbody>
              @foreach($defaultpromos as $defaultpromo)
                <tr>
                  <td><a href="/defaultpromo/{{{$defaultpromo->id}}}/edit">{{$defaultpromo->nome}}</a></td>
                  <td> <img src="/promo/mini/{{$defaultpromo->caminho}}"></td>
                  <td>{{$defaultpromo->inicio}}</td>
                  <td>{{$defaultpromo->fim}}</td>
                  <td><input type="checkbox" name="dia" value="dia @if($defaultpromo->dom)" checked @endif" disabled ><br></td>
                  <td><input type="checkbox" name="dia" value="dia @if($defaultpromo->seg)" checked @endif" disabled ><br></td>
                  <td><input type="checkbox" name="dia" value="dia @if($defaultpromo->ter)" checked @endif" disabled ><br></td>
                  <td><input type="checkbox" name="dia" value="dia @if($defaultpromo->qua)" checked @endif" disabled ><br></td>
                  <td><input type="checkbox" name="dia" value="dia @if($defaultpromo->qui)" checked @endif" disabled ><br></td>
                  <td><input type="checkbox" name="dia" value="dia @if($defaultpromo->sex)" checked @endif" disabled ><br></td>
                  <td><input type="checkbox" name="dia" value="dia @if($defaultpromo->sab)" checked @endif" disabled ><br></td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

{{ $defaultpromos->links() }}
<form action='/defaultpromo/create'>
  <button type="submit" class="btn btn-default navbar-btn">Adicionar</button>
</form>

@endsection('conteudo')


