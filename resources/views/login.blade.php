@extends('layout.site')
@section('titulo','Login')
@section('conteudo')
  <div class="container"><h3 class="center">Acessar resultados</h3><div class="row">
    <form class="" action="{{route('login')}}" method="post">
       {{ csrf_field() }}
       <div class="input-field">
         <input type="text" name="pront"><label>Prontuario</label>
       </div>  
       <div class="input-field">
         <input type="password" name="senha"><label>Senha</label>
       </div>      
       <button class="btn deep-green">Visualizar</button>
    </form>
  </div></div>
@endsection