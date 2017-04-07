

@extends('master')

@section('equipamentos')
active
@endsection

@section('conteudo')
          <h2>equipamentos</h2>
          <div class="table-responsive">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Nome</th>
                  <th>Loja</th>
                  <th>macAddress</th>
                  <th>ip</th>
                  <th>width</th>
                  <th>height</th>
                  <th>colorDepth</th>
                  <th>pixelDepth</th>
                  <th>availWidth</th>
                  <th>availHeight</th>
                </tr>
              </thead>
              <tbody>
              @foreach($equipamentos as $equipamento)
                <tr>
                  <td>
                      <form action='equipamentos/{{$equipamento->id}}/edit'>

                        <button type="submit" class="btn btn-default navbar-btn">editar</button>
                      </form>

                  </td>
                  <td>{{$equipamento->nome}}</td>
                  <td>@if(count($equipamento->loja))
                          {{$equipamento->loja->nome}} 
                      @endif</td>
                  <td>{{$equipamento->macAddress}}</td>
                  <td>{{$equipamento->ip}}</td>
                  <td align="right">{{$equipamento->width}}</td>
                  <td align="right">{{$equipamento->height}}</td>
                  <td align="right">{{$equipamento->colorDepth}}</td>
                  <td align="right">{{$equipamento->pixelDepth}}</td>
                  <td align="right">{{$equipamento->availWidth}}</td>
                  <td align="right">{{$equipamento->availHeight}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

{{ $equipamentos->links() }}


@endsection('conteudo')


