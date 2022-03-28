# php_challenges
This repo contains PHP code with concept usage.

1) traits/challenge_1.php:
- There are two classes. 
One to calculate total number of coins. For instance, if you want to give someone 468, you would give them four 100 coins, two 25 coins, one 10 coin, one 5 coin, and three 1 coins, for a total of 11 coins.
second class returns an array of even numbers from given input.

Both classes uses Remainder trait, which will return remainder of given number and division.

2) supermarket/cart.php:
- Create two orders one for supermarket items (i.e. apple, watermelon and so) and one for instruments (i.e. piano, drums and so)
- class MarketPrices{} is extended by both orders classes, to setup products, prices and their discounts.
- DiscountInterface has two methods to calculate each product price with quantity and discounts. this interface is implemented by both classes with different discount types and settings.
- cart.php creates both orders with product/price/discount settings and displays final price for both the orders.

3) leapyear/julian_calender.php
- The Revised Julian Calendar has a leap day on Feb 29th of leap years as follows:
  - Years that are evenly divisible by 4 are leap years. 
  - Exception: Years that are evenly divisible by 100 are not leap years.
  - Exception to the exception: Years for which the remainder when divided by 900 is either 200 or 600 are leap years.
  - class LeapYear {} serves single purpose of finding leap year count using provided start and end year. We provide years during instance creation. so it is open for extention and closed for modification. i.e., count the weeks between years or count total days between years and so.
