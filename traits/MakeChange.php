<?php

class MakeChange
{
        use GetRemainderTrait;

        public $coins = [1, 5, 10, 25, 100, 500];

        public function make_change($amount)
        {
            $coins_count = count($this->coins);
            $total_coins = 0;
            for ($i = $coins_count - 1; $i >= 0; $i--) {
                $get_coins = (int)($amount / $this->coins[$i]);
                if ($get_coins > 0) {
                    $total_coins += $get_coins;
                }
                $remainder = $this->remainder($amount, $this->coins[$i]);
                $amount = $remainder;

            }

            return $total_coins;
        }
}
