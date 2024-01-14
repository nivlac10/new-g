<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createPayment()
    {
        // Prepare your data
        $data = [
            'amount' => 100,
            'appId' => 'b8cc0ba5e66f026b3ed40148f61f82f7',
            'currency' => 'BRL',
            'merOrderNo' => '202311102212386074', // Updated value
            'notifyUrl' => 'https://api.betcatpay.net/',
            'returnUrl' => 'https://api.betcatpay.net/',
            'sign' => '7407049a004b6438b905f5aca153ca6a6b188ff231150b4209b66b2f6a11ae21', // Updated signature
        ];

        // Send the request as JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json;charset=utf-8',
            'Accept' => 'application/json',
        ])->post('https://v1.a.betcatpay.com/api/v1/payment/order/create', $data);

        return $response->body();
    }
}
