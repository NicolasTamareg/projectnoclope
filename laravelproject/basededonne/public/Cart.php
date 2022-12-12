<?php

class Cart
{
public function getId():string{
    return uniqid();
}

public function getProducts():array
{
    return [
        [
        'name'=>'Peluche',
        'price'=>1499
        ],
        [
        'name'=>'Peluche2',
        'price'=>1500  
        ]
        ];
}

public function getTotal(): int{
    return array_reduce($this->getProducts(),fn(int $acc, array $product)=>
    $acc + $product['price'],0);
}

}