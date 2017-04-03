@extends('master')

@section('conteudo')

<p>Date: <input type="text" id="datepicker"></p>
 


  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
 
@endsection('conteudo')
