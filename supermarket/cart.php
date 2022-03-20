<?php
spl_autoload_register();

/*
 * Orders class uses Discount interface for discount and price calculation for each product and quantity
 * */

$order_obj = new Orders();
//  products with price per product
$products = ['apple' => 2.50, 'watermelon' => 4.99, 'pineapple' => 5.99];
$order_obj->setProducts($products);

// discount types for discounted products
$products_discounts = ['apple' => 'b3', 'watermelon' => 'b1g1'];
$order_obj->setDiscounts($products_discounts);
$order_obj->setPercentageOff(20); // discount %

// cart products with quantity
$cart = ['apple' => 3, 'watermelon' => 3, 'pineapple' => 2];
$final_prices = $order_obj->calculatePrices($cart);
/*print "<pre>";
print_r($final_prices);*/

print "Supermarket total: ". $final_prices['cart_total'] ."<br><br>";

/*
 * Instruments class uses same Discount interface with different calculations for discount and price
 * */
$instrument_order = new Instruments();
//  products with price per product
$inst_products = ['piano' => 125, 'drums' => 499, 'violin' => 99.99];
$instrument_order->setProducts($inst_products);

// discount types for discounted products
$inst_discounts = ['piano' => 'wintersale', 'drums' => 'xmas', 'violin' => 'percentage'];
$instrument_order->setDiscounts($inst_discounts);
$instrument_order->setPercentageOff(15); // discount %

// cart products with quantity
$cart = ['piano' => 1, 'drums' => 1, 'violin' => 2];
$final_prices = $instrument_order->calculatePrices($cart);
//print_r($final_prices);

print "Instruments total: ". $final_prices['cart_total'];