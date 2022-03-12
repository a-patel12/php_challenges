<?php

trait GetRemainderTrait{
    public function remainder($number, $divison)
    {
        if($divison > 0) {
            return $number % $divison;
        }
        else{
            return -1;
        }
    }
}