<?php
spl_autoload_register();
/*
 * Both the below classes uses the GetRemainderTrait trait. which returns the remainder of given number.
 */

/*
 * Calculate total number of coins require to make a given amount of change.
 */
$amounts = [1, 0, 12, 468, 123456];
$obj = new MakeChange();

foreach($amounts as $amount)
{
    print "$$amount requires ".$obj->make_change($amount)." coins. <br><br>";
}

/*
 * Return an array with Even numbers from given array of numbers.
 */
$input = [2, 5, 6, 8, 3, 11, 12];

$obj_even = new EvenNumber();
print "<pre>";
print_r($input);
print "<br>Even numbers Output: <br>";
print_r($obj_even->getEvenNumber($input));