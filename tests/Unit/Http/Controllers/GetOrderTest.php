<?php

namespace Tests\Http\Controllers;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetOrderTest extends TestCase
{
    use WithFaker;

    public function testGetOrdersByApi()
    {
        $body = [

        ];
        $response = $this->post('api/orders', $body, ['Accept'=>'application/json']);
        $response->dump();
        $this -> assertTrue(true);
    }
}
