<?php

namespace App\Services;

use App\Models\Conta;

class ContaService
{
    public function criarConta($dados)
    {
        try {
            $array_dados = [
                'conta_id' => $dados['conta_id'],
                'saldo' => $dados['valor'] 
            ];

            $conta = new Conta();
            $conta->fill($array_dados);
            $conta->save();

            return $conta;

        return $conta;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
        
    }

    public function obterConta($contaId)
    {
        try {
            $conta = Conta::query()->select('conta_id', 'saldo')->find($contaId);

            if($conta){
                return [
                    'conta_id' => $conta->conta_id, 
                    'saldo' => $conta->saldo
                ];
            }

            return null;

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
         
    }
}
