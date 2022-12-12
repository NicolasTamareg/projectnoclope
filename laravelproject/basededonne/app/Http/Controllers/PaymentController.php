<?php

namespace App\Http\Controllers;
use Stripe\Chekout\Session;
use Stripe\Stripe;


use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    
    {
        return view('clients.index');
    }


public function create(){

      
    $stripe = new \Stripe\StripeClient(
        'sk_test_51MEHK3Gg161a08f0yIcpxAGYl4zOEXD2zx76TCVYyjlFmoQNkQdeH2wXFApYUDwwzF1hEogbtwS3QVyG4bM1BNHe00NHx0dL2p'
      );
      $stripe->customers->create([
        'description' => 'Premier fumeur',
      ]);

      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $customer=$session = \Stripe\Checkout\Session::create([
          'payment_method_types' => ['card'],
          'mode' => 'setup',
          // 'customer' => $customer['id'], 
         'success_url' => 'http://127.0.0.1:8000/clients/success?session_id={CHECKOUT_SESSION_ID} ',
          'cancel_url' => 'http://127.0.0.1:8000/clients/cancel',
        ]);
        $stripe = new \Stripe\StripeClient(
            'sk_test_51MEHK3Gg161a08f0yIcpxAGYl4zOEXD2zx76TCVYyjlFmoQNkQdeH2wXFApYUDwwzF1hEogbtwS3QVyG4bM1BNHe00NHx0dL2p'
          );
          $stripe->setupIntents->create([
            'payment_method_types' => ['card'],
          ]);

    //   $stripe->checkout->sessions->create([
    //       'payment_method_types' => ['card'],
    //       'mode' => 'setup',
    //       'customer'=>'cus_MyDnqWVQ9paXd1',
    //      'success_url' => 'http://127.0.0.1:8000/api/clients/success?session_id={CHECKOUT_SESSION_ID}', //A voir si lurl est bonne
    //       'cancel_url' => 'http://127.0.0.1:8000/clients/cancel',
    //     ]);    
     
}


// public function __construct(readonly private string $clientSecret)
// {
//     Stripe::setApiKey($this->clientSecret);
//     Stripe::setApiVersion('2022-11-15');
// }


//    public function startPayment (Cart $cart){
//     $cartId = $cart->getId();
//     $session = Session::create([
//         'line_items'=>[
//             array_map(fn(array $product)=>[
//                 'quantity'=>1,
//                 'price_data'=>[
//                     'currency'=>'EUR',
//                     'product_data'=> [
//                         'name'=>$product['name']
//                     ],
//                     'unit_amount' => $product['price']
//                     ]
//                 ], $cart->getProducts())
//         ],
// 'billing_adress_collection'=>'required',
// 'shipping_adress_collection'=>[
//     'allowed_countries'=>['FR']
// ],
// 'metadata'=> [
//     'cart_id'=> $cartId
// ]


//     ]);
// $cart->setSessionId($session->id);
// header("/" .$session->url);
// return view ('/');

//    }
}
