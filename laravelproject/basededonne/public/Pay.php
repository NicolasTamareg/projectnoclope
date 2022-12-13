<?php
require '../vendor/autoload.php';
$cart = new\App\Cart();
$payment = new\App\StripePayment(STRIPE_SECRET);
$payment->startPayment($cart);