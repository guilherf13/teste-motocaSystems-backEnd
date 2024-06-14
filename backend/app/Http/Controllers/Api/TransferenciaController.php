<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferenciaRequest;
use App\Services\TransferenciaService;

class TransferenciaController extends Controller
{
    protected $transacaoService;

    public function __construct(TransferenciaService $transacaoService)
    {
        $this->transacaoService = $transacaoService;
    }

    public function create(TransferenciaRequest $request)
    {
        $resultado = $this->transacaoService->realizarTransacao($request->all());
        if ($resultado['status'] === 'success') {
            return response()->json(['conta_id' => $resultado['conta_id'], 'saldo' => $resultado['saldo']], 201);
        } else {
            return response()->json([], 404);
        }
    }
}

