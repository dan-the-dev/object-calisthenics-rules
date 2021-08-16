<?php

/** Rule 2 - Don't use the "else" keyword */

/** 
 * Avoiding the **else** keyword promotes a **main execution line** with special cases handled. It suggest polimorphism to handle complex conditional cases, making the code more explicit. We can use NULL object pattern to express that a result has no value.
 * */

/** AVOID THIS */

class WrongExample {
    public function doSomething(int $a) {
     if ($a < 0) {
      // do something
     } else {
      // handle special case
     }
    }
   }

/** DO THIS INSTEAD */
class CorrectExample {
    public function doSomething(int $a) {
     if ($a > 0) {
      // guard to handle special case
     }
     // do something
    }
   }
