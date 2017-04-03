

@extends('master')

@section('lojas')
active
@endsection

@section('conteudo')
          <h2>Lojas</h2>
          <div class="table-responsive">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nome</th>
                  <th>Equipamentos</th>
                </tr>
              </thead>
              <tbody>
              @foreach($lojas as $loja)
                <tr>
                  <td>{{$loja->codigo}}</td>
                  <td>{{$loja->nome}}</td>
                  <td>
                    <ul>
                        @foreach($loja->equip as $equip)
                            <li>{{$equip->nome}}</li>
                        @endforeach
                    </ul>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

{{ $lojas->links() }}
<form action='lojas/create'>
  <button type="submit" class="btn btn-default navbar-btn">Adicionar</button>
</form>

@endsection('conteudo')


