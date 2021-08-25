<?php

/** Rule 7 - Don't abbreviate */

/** 
 * **Always make name explicit**, even if it cost a long name: no need to save characters. Abbreviations can only lead to misunderstanding and a code hard to be read.
 * */

/** AVOID THIS */

class Calc { 
    public function calcSumTwoNums() { /** */ }
}

/** DO THIS INSTEAD */
class Calculator { 
    public function calculateSumOfTwoNumbers() { /** // sum would be a good name for this method, just made an example to show problems with abbreviations. */ }
}
