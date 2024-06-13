<?php

namespace App\Services;

use App\Models\Conta;
use Illuminate\Support\Facades\DB;

class TransferenciaService
{
    const TAXA_DEBITO = 0.03;
    const TAXA_CREDITO = 0.05;

    public function realizarTransacao($dados)
    {
        $conta = Conta::find($dados['conta_id']);
        if (!$conta) {
            return ['status' => 'error', 'message' => 'Conta não encontrada'];
        }

        DB::beginTransaction();
        try {
            $valor = $dados['valor'];
            $formaPagamento = $dados['forma_pagamento'];

            switch ($formaPagamento) {
                case 'D': // Débito
                    $taxa = $valor * self::TAXA_DEBITO;
                    break;
                case 'C': // Crédito
                    $taxa = $valor * self::TAXA_CREDITO;
                    break;
                case 'P': // Pix
                    $taxa = 0;
                    break;
                default:
                    throw new \Exception('Forma de pagamento inválida');
            }

            if ($conta->saldo < ($valor + $taxa)) {
                throw new \Exception('Saldo insuficiente');
            }

            $valorComTaxa = $valor + $taxa;

            $conta->saldo -= $valorComTaxa;
            $conta->save();

            DB::commit();
            return ['status' => 'success', 'conta_id' => $conta->conta_id, 'saldo' => $conta->saldo];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
