<?php

class EvenNumber{
    use GetRemainderTrait;

    public function getEvenNumber($numbers)
    {
        if(!is_array($numbers))
            return "Requires an array as input";

        $numbers_count = count($numbers);
        $even_numbers = array();
        if($numbers_count > 0)
        {
            for($i=0; $i < $numbers_count; $i++)
            {
                if(($this->remainder($numbers[$i], 2)) == 0)
                {
                    $even_numbers[] = $numbers[$i];
                }
            }

        }
        return $even_numbers;
    }
}