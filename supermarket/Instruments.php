<?php
class Instruments extends MarketPrices implements DiscountInterface{

    public $instruments_quantity_prices = array();
    public $final_price = 0;
    /**
     * @param $price
     * @param $quantity
     * @param $discount_type
     * @return mixed
     */
    public function getPriceAfterDiscount($price, $quantity, $discount_type)
    {
        $total = $quantity * $price;

        if(!empty($discount_type)){
            if($discount_type == 'xmas'){
                $today = $this->getToday();
                if($today == date('Y-12-25')){
                    $total = ($total) - (($total) * ($this->getPercentageOff()/100));
                }
            }
            else if($discount_type == 'percentage'){
                $total = ($total) - (($total) * ($this->getPercentageOff()/100));
            }else if($discount_type == 'wintersale'){
                $today = $this->getToday();
                if($today >= date('Y-12-21' && $today <= 'Y-03-20')){ // we can make this dynamic
                    $total = ($total) - (($total) * 0.25); // 25% winter sale, possible to create dynamic
                }

            }
        }

        return $total;
    }

    /**
     * @param $cart_products
     * @return mixed
     */
    public function calculatePrices($cart_products)
    {

        if(count($cart_products) > 0)
        {
            foreach($cart_products as $product => $quantity){
                $product_price = $this->getProducts($product);
                $product_discount = $this->getDiscounts($product);
                if (!empty($product_price[$product])) { // price > 0 and not empty
                    $item_price = $this->getPriceAfterDiscount($product_price[$product], $quantity, $product_discount[$product]);
                    $this->instruments_quantity_prices['items'][$product] = ['qty' => $quantity, 'total' => $item_price,'discount' => $product_discount[$product]]; // added discount type as a value in return array.
                    $this->final_price += $item_price;
                }
            }
            $this->instruments_quantity_prices['cart_total'] = $this->final_price;
        }

        return $this->instruments_quantity_prices;
    }

    public function getToday(){
        return date('Y-m-d');
    }
}