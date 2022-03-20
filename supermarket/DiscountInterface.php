<?php
interface DiscountInterface{
    public function getPriceAfterDiscount($price, $quantity, $discount_type);
    public function calculatePrices($cart_products);
}