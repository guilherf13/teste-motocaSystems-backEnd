<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContaRequest;
use App\Services\ContaService;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    protected $contaService;

    public function __construct(ContaService $contaService)
    {
        $this->contaService = $contaService;
    }

    public function create(ContaRequest $request)
    {
        try {
            $conta = $this->contaService->criarConta($request->all());
            return response()->json(['conta_id' => $conta->conta_id, 'saldo' => $conta->saldo], 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        
    }

    public function find($id)
    {
        $conta = $this->contaService->obterConta($id);
        if ($conta) {
            return response()->json([
                'conta_id' => $conta['conta_id'],
                'saldo' => $conta['saldo'],
            ], 201);
        } else {
            return response()->json([], 404);
        }
    }
}

