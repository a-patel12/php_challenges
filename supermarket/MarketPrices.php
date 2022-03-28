<?php
class MarketPrices{
    public $products;
    public $discounts;
    public $percentage_off; // used by buy n get n price calculation and overall price discount if any

    /**
     * @return mixed
     */
    public function getProducts($product_key = '')
    {
        if($product_key != ''){
            $prd_price = isset($this->products[$product_key]) ? $this->products[$product_key] : '';
            return [$product_key => $prd_price];
        }
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getDiscounts($product_key = '')
    {
        if($product_key != ''){
           $prd_discount = isset($this->discounts[$product_key]) ? $this->discounts[$product_key] : '';
           return [$product_key => $prd_discount];
        }
        return $this->discounts;
    }

    /**
     * @param mixed $discounts
     */
    public function setDiscounts($discounts)
    {
        $this->discounts = $discounts;
    }

    /**
     * @return mixed
     */
    public function getPercentageOff()
    {
        return $this->percentage_off;
    }

    /**
     * @param mixed $percentage_off
     */
    public function setPercentageOff($percentage_off)
    {
        $this->percentage_off = $percentage_off;
    }

}