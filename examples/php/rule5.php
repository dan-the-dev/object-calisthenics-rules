<?php

/** Rule 5 - No getters/setters/properties */

/** 
 * We follow the original idea of OOP as a network of entities collaborating by passing messages each other. Don't ask data and then act on it; instead, **tell the object what you need it to do for you**. Data Structures and Objects have different responsibilities.
 * */

/** AVOID THIS */
class WrongUser {
    public Id $id;
    public Email $email;
    public Password $password;
    
    public function setId(Id $newId) { /** ... */ }
    public function setEmail(Email $newEmail) { /** ... */ }
    public function setPassword(Password $newPassword) { /** ... */ }
    public function getId() { return $this->id; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
}
   
/** DO THIS INSTEAD */
class User {
    private Id $id;
    private Email $email;
    private Password $password;
    
    // you can only set them in constructor, then we only expose behaviors
    
    public function login() { /** ... */ }
    // ...
}
   