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
        'sk_test_51MCsrwIRssU38XkxBIpH0betOU585QECdUhvHxnDKc7qIWFjZ8iqQKgFk0cDDaArqCtu3P0674uPeJIAkTrwLhzl004LGlClYq'
      );
      $stripe->customers->create([
        'description' => 'Premier fumeur',
      ]);

      $stripe = new \Stripe\StripeClient(
        'sk_test_51MCsrwIRssU38XkxBIpH0betOU585QECdUhvHxnDKc7qIWFjZ8iqQKgFk0cDDaArqCtu3P0674uPeJIAkTrwLhzl004LGlClYq'
      );
      $stripe->checkout->sessions->create([
          'payment_method_types' => ['card'],
          'mode' => 'setup',
          'customer_id'=>'cus_My8uesbY25MRqI',
         'success_url' => 'http://127.0.0.1:8000/clients/success?%7BCHECKOUT_SESSION_ID%7D', //A voir si lurl est bonne
          'cancel_url' => 'http://127.0.0.1:8000/clients/cancel',
        ]);

   
     
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
// 'mode'=>'payment',
// 'success_url'=>'http://localhost:8000/success.php',
// 'cancel_url' => 'http://localhost:8000/',
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
