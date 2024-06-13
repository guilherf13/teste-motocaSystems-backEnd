<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransferenciaTest extends TestCase
{
    use RefreshDatabase;

    public function testContaFluxo()
    {
        // 1. Criar uma conta com saldo inicial de R$ 500
        $response = $this->post('/api/conta', ['conta_id' => random_int(1, 30), 'valor' => 500]);
        $response->assertStatus(201);
        $contaId = $response->json('conta_id');

        // 2. Validar se uma conta existe
        $response = $this->get("/api/conta/{$contaId}");
        $response->assertStatus(201);

        // 4. Efetuar uma compra no valor de R$50 utilizando a opção de débito
        $response = $this->post('/api/transferencia', [
            'conta_id' => $contaId,
            'valor' => 50,
            'forma_pagamento' => 'D'
        ]);
        $response->assertStatus(201);

        // 5. Executar uma compra de R$100 usando a opção de crédito
        $response = $this->post('/api/transferencia', [
            'conta_id' => $contaId,
            'valor' => 100,
            'forma_pagamento' => 'C'
        ]);
        $response->assertStatus(201);

        // 6. Realizar uma transferência via Pix no valor de R$75
        $response = $this->post('/api/transferencia', [
            'conta_id' => $contaId,
            'valor' => 75,
            'forma_pagamento' => 'P'
        ]);
        $response->assertStatus(201);
    }
}
