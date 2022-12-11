<?php

namespace App\Http\Controllers;
use Stripe\Chekout\Session;
use Stripe\Stripe;


use Illuminate\Http\Request;

class PaymentController extends Controller
{

public function __construct(readonly private string $clientSecret)
{
    Stripe::setApiKey($this->clientSecret);
    Stripe::setApiVersion('2022-11-15');
}


   public function startPayment (Cart $cart){
    $cartId = $cart->getId();
    $session = Session::create([
'mode'=>'payment',
'success_url'=>'http://localhost:8000/success.php',
'cancel_url' => 'http://localhost:8000/',
'billing_adress_collection'=>'required',
'shipping_adress_collection'=>[
    'allowed_countries'=>['FR']
],
'metadata'=> [
    'cart_id'=> $cartId
]


    ]);


   }
}
