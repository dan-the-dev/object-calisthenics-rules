<?php

/** Rule 6 - One dot per line */

/** 
 * Avoid situations like `dog→body()→tail()→wag()` with a chain of calls, because that's strictly coupled with classes very far from the caller. **The caller here know only the Dog class and should talk only to it**, so for example we could have a method `dog→expressHappiness()` to encapsulate that behaviour.
 * */

/** AVOID THIS */

class WrongDog {
    private WrongDogBody $body;

    public function body(): WrongDogBody { return $this->body; }
}

class WrongDogBody {
    private WrongDogTail $tail;

    public function tail(): WrongDogTail { return $this->tail; }
}

class WrongDogTail { 
    public function wag(): void { /** wag the tail action */ }
}
// used somewhere
$dog = new WrongDog();
$dog->body()->tail()->wag();
   
/** DO THIS INSTEAD */
/** DO THIS INSTEAD */
class Dog {
    private DogBody $body;
    
    public function expressHappiness(): void { return $this->body->wagTail(); }
}

class DogBody {
    public function wagTail(): void { /** do something */ return; }
}


// used somewhere
$dog = new Dog();
$dog->expressHappiness();