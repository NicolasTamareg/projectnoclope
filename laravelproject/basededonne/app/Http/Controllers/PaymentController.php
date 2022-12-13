<?php

namespace App\Http\Controllers;

use Stripe\Chekout\Session;
use Stripe\Stripe;


use Illuminate\Http\Request;
use SebastianBergmann\Template\Template;

class PaymentController extends Controller
{

  public function index()

  {
    return view('clients.index');
  }


  public function create(Request $request)
  {


    $stripe = new \Stripe\StripeClient(
      'sk_test_51MEHK3Gg161a08f0yIcpxAGYl4zOEXD2zx76TCVYyjlFmoQNkQdeH2wXFApYUDwwzF1hEogbtwS3QVyG4bM1BNHe00NHx0dL2p'
    );
    // Recuperer le session id contenu dans $request
    // Recuperer l'ID du User dans le chemin de la requete
    // Recuperer la session Stripe grace au sessionId
    // Recuperer le setupIntent grace a la session
    // Recuperer paymetMethod grace a setupIntent
    // Stocker l'ID de la paymentMethod dans la table Users
    
    // $stripe->setupIntents->create([
    //   'payment_method' => $session->
    //   'payment_method_types' => ['card'],
    // ]);
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
