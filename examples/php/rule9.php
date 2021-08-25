<?php

/** Rule 9 - No classes with more than 2 instance variables */

/** 
 * The more instance variables, the lower is the cohesion within the class. Classes with more than one parameters are usually orchestrators, those with only one are actuators.
 * */

/** AVOID THIS */

class Example { 
    public function __construct(string $firstName, string $lastName, string $email, string $password) { /** ... */ }
}

/** DO THIS INSTEAD */
class Example { 
    public function __construct(PersonalData $personalData, LoginData $loginData) { /** ... */ }
}

class PersonalData {
    public function __construct(string $firstName, string $lastName) { /** ... */ }
}

class LoginData {
    public function __construct(string $email, string $password) { /** ... */ }
}