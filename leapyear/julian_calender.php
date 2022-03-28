<?php
spl_autoload_register();
//ini_set('memory_limit', '512M'); // Enable this for large numbers mod calculation i.e. start year = 123456, end year= 7891011

$test_years = [[2016,2017], [2019,2020] , [1900, 1901], [2000, 2001], [2800, 2801], [1234, 5678]];

foreach($test_years as $each_range)
{
    $ly_obj = new LeapYear($each_range[0], $each_range[1]);
    $total_leap_years = $ly_obj->findLeapYears();
    echo "(".$each_range[0] .",". $each_range[1].") => ".$total_leap_years. PHP_EOL;
}