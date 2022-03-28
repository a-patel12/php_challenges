<?php
class Orders extends MarketPrices implements DiscountInterface {

    public $product_quantity_prices = array();
    public $final_price = 0;

    /**
     * @param $cart_products
     * @return array
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
                    $this->product_quantity_prices['items'][$product] = ['qty' => $quantity, 'total' => $item_price];
                    $this->final_price += $item_price;
                }
            }
            $this->product_quantity_prices['cart_total'] = $this->final_price;
        }

        return $this->product_quantity_prices;
    }

    /**
     * @param $price
     * @param $quantity
     * @param $discount_type
     * @return float|int
     */
    public function getPriceAfterDiscount($price, $quantity, $discount_type)
    {
        $total = $quantity * $price;

        if(!empty($discount_type)){
           if($discount_type == 'b3'){
               if($quantity >=3 ){
                   $total = ($total) - (($total) * ($this->getPercentageOff()/100));
               }
           }
           else if($discount_type == 'b1g1'){
               $b1g1_items = floor($quantity/2);
               $individual_items = $quantity % 2;
               $total = ($b1g1_items + $individual_items) * $price;
           }
           else if($discount_type == 'percentage'){
               $total = ($total) - (($total) * ($this->getPercentageOff()/100));
           }

        }

        return $total;
    }

}