<?php

/** Rule 3 - Wrap all primitives and string */

/** 
 * No arguments of public methods should be primitives, except constructors. Also no return value should be a primitive, for public methods. Instead of primitives, we must **create a class to describe the concept and contain its behaviours**.
 * */

/** AVOID THIS */

class WrongShop {
    public function buy(int $money, string $productId) {
        // do something
    }
}

/** DO THIS INSTEAD */
class CorrectShop {
    public function buy(Money $money, Product $product) {
        // do something
    }
}