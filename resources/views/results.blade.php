@extends('layout.site')
@section('titulo','Resultados')
@section('conteudo')
  <div class="container"><h3 class="center">Resultados</h3><div class="row">
    <table class="highlight">
     <tr>
        <th>Data</th>
        <th>Exame</th>
        <th>Paciente</th>
        <th>Arquivo</th>
     </th>
     @foreach($dados as $dado)
     <tr>
         @php
           $arquivo = str_pad($dado->CODIGOCLINICA,3,'0',STR_PAD_LEFT).
               date('ymd', strtotime($dado->DATA)).
               str_pad($dado->TUSS,8,'0',STR_PAD_LEFT).               
               str_pad($dado->IDPACIENTE,6,'0',STR_PAD_LEFT).'.pdf';
         @endphp

        <td>{{ date('d-m-Y', strtotime($dado->DATA)) }}</td>
        <td>{{ $dado->DESCRICAO }}</td>
        <td>{{ $dado->NOME }}</td>
        <td><a href='laudos/{{ $arquivo }}'><img src='imagens/pdf.png' width=40 target='_blank'></a></td>
     </tr>
     @endforeach                  
    </table>
  </div></div>
@endsection