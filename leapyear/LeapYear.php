<?php

class LeapYear
{
    public $start_year;
    public $end_year;
    public $total_leap_years = 0;
    public $all_years = array();

    public function __construct($start_year, $end_year)
    {
        $this->start_year = $start_year;
        $this->end_year = $end_year;
    }

    public function findLeapYears()
    {
        $start_year = $this->start_year;
        $end_year = $this->end_year;

        if($end_year < $start_year)
            return "End year should be greater than start year.";
        else{

            if($start_year == $end_year)
            {
                $this->all_years[] = $start_year;
            }else {
                $this->all_years = $this->getAllYears(); // This will exclude last year from list. i.e. 2021 = 2021-01-01 so not require checking if its leap year.
            }

            $allyears = count($this->all_years);
            for($i = 0; $i < $allyears ; $i++)
            {
                $ly = $this->getLeapYearCount($this->all_years[$i]);
                if($ly == 1){
                    $this->total_leap_years++;
                }
            }

        }

        return $this->total_leap_years;
    }

    public function getAllYears()
    {
        $years = array();
        for ($each_year = $this->start_year; $each_year < $this->end_year; $each_year++) {
            $years[] = $each_year;
        }
        return $years;
    }

    public function getLeapYearCount($year)
    {
       $ly= 0;

        if($year % 4 == 0){
            $ly = 1; // if divided by 4

            if($year % 100 == 0){
                $ly = 0; // Exception = if divided by 100 not LY
                if($year % 900 == 200 || $year % 900 == 600){
                    $ly = 1; // Exception to exception = remainder when divided by 900 is 200 or 600, its a LY
                }
            }
        }

        return $ly;
    }
}