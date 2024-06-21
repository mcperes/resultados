<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    //
    public function home() 
    {
        return view('login');
    }
    
    public function login(Request $req)
    {
        $dados = $req->all();

        $varPront = $dados['pront'];
        $varSenha = $dados['senha'];

        $autenticar = DB::select(
            'Select * From PACIENTE 
             Where  PACIENTE.PRONT = ? And PACIENTE.SENHA = ? ', [$varPront, md5($varSenha)]);
       
        if ($autenticar)   
        {
            $dados = DB::select(
                'Select LAUDO.DATA, TUSS.DESCRICAO, PACIENTE.NOME, LAUDO.TUSS,
                    LAUDO.IDPACIENTE, LAUDO.CODIGOCLINICA 
                From LAUDO Inner Join TUSS On LAUDO.TUSS = TUSS.TUSS Inner Join
                    PACIENTE On PACIENTE.IDPACIENTE = LAUDO.IDPACIENTE
                    And PACIENTE.CODIGOCLINICA = LAUDO.CODIGOCLINICA
                Where
                    PACIENTE.PRONT = ? And PACIENTE.SENHA = ? 
                Order By LAUDO.DATA Desc ', [$varPront, md5($varSenha)]);
            
            if ($dados == null) {
                return view('naoencontrado');    
            } else {
                return view('results', [ 'dados' => $dados ]);
            }
        } 
        else 
        {
            return view('usuarionaoexiste');    

        }        
    }
}
