# Object Calisthenics Rules

## Introduction

A repository from [DAN-THE-DEV](https://www.linkedin.com/in/daniele-scillia/) to learn Object Calisthenics rules and see some examples about them in some different languages.

## What is Object Calisthenics

When it comes to Object Oriented programming, it's easy to make mistakes; with Object Calisthenics you have some rules that you can use to bring the fundamentals of the best practices of this paradigm. Object Calisthenics rules born with the objective of preventing Code Smells.

**Object Calisthenics** is about constraining software design decision: it's not about what you can do, but more about **what you cannot do**.

Why do we need to consider design important:

- TDD is not enough: it definitely has positive side effects on design, but will not take care of design by itself
- DRY is not enough: refactoring efforts cannot be put only on removing duplication, we need more than that
- TDD punish you if you don't understand design: if writing a test become complex, it's a clear feedback that design need an improvement

There are two euristics beyond those rules:

- **Tell, don't ask:** tell object to perform actions instead of asking them for data to be process outside of it; this comes from the original idea of Object Oriented programming of having objects communicate with each other via messages
- **Law of Demeter:** aka "don't talk with strangers", each component should only talk to its close friends in order to favor simplicity

## Object Calisthenics rules

**1. Only one level of indentation per method**

You should only keep one level of indentation per method, avoiding the nest of commands; it helps to ensure that a method focuses on doing **only one thing** and reduce the size of methods, enabling easier reuse. This approach favors readability and simplicity, resulting in methods with a main line for their main responsibilities, ending in the last line of method, and some special cases handled in the path. A techniques to avoid levels of indentation is using guards to create an exit for special cases.

```php
/** AVOID THIS */
class WrongExample {
 public function doSomething(int $a) {
  if ($a > 0) {
   if ($a < 10) {
    return true;
   }
  }
  return false;
 }
}
```

See how we can remove the multiple indentation and simplify our code:

```php
/** DO THIS INSTEAD */
class CorrectExample {
 public function isBetween1And10(int $a) {
  if ($a > 0) {
   return $this-> checkIfLowerThan10($a);
  }
  return false;
 }
 
 public function checkIfLowerThan10(int $a) {
  if ($a < 10) {
   return true;
  }
  return false;
 }
}
```

**2. Don't use the "else" keyword**

Avoiding the **else** keyword promotes a **main execution line** with special cases handled. It suggest polimorphism to handle complex conditional cases, making the code more explicit. We can use NULL object pattern to express that a result has no value.

```php
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
```

We can create **guards** to eliminate else command and improve readability of our code:

```php
/** DO THIS INSTEAD */
class CorrectExample {
 public function doSomething(int $a) {
  if ($a > 0) {
   // guard to handle special case
  }
  // do something
 }
}
```

**3. Wrap all primitives and string**

No arguments of public methods should be primitives, except constructors. Also no return value should be a primitive, for public methods. Instead of primitives, we must **create a class to describe the concept and contain its behaviours**.

```php
/** AVOID THIS */
class WrongShop {
 public function buy(int $money, string $productId) {
  // do something
 }
}
```

We should always create classes that describe and represent business concepts we need:

```php
/** DO THIS INSTEAD */
class CorrectShop {
 public function buy(Money $money, Product $product) {
  // do something
 }
}
```

**4. First class collections**

No arguments of public methods should be primitive collections (array, hash, tables, etc.). We must **create a class to handle that collection** and the behaviour of going throught its values.

```php
/** AVOID THIS */
class WrongLeague {
 public function newParticipants(array $newParticipantsList) {
  // do something
 }
}
```

We should always create classes that describe and represent the list concepts we need:

```php
/** DO THIS INSTEAD */
class CorrectLeague {
 public function newParticipants(Participants $newParticipants) {
  // do something
 }
}

// Participants class allow us to create a list of participants validating data and offer behavior of order and go throught all the list
```

**5. No getters/setters/properties**

We follow the original idea of OOP as a network of entities collaborating by passing messages each other. Don't ask data and then act on it; instead, **tell the object what you need it to do for you**. Data Structures and Objects have different responsibilities.

```php
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
```

We should always create classes that describe and represent the list concepts we need:

```php
/** DO THIS INSTEAD */
class User {
 private Id $id;
 private Email $email;
 private Password $password;
 
 // you can only set them in constructor, then we only expose behaviors
 
 public function login() { /** ... */ }
 // ...
}
```

**6. One dot per line**

Avoid situations like `dog→body()→tail()→wag()` with a chain of calls, because that's strictly coupled with classes very far from the caller. **The caller here know only the Dog class and should talk only to it**, so for example we could have a method `dog→expressHappiness()` to encapsulate that behaviour.

```php
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
```

We should always create classes that describe and represent the list concepts we need:

```php
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
```

**7. Don't abbreviate**

**Always make name explicit**, even if it cost a long name: no need to save characters. Abbreviations can only lead to misunderstanding and a code hard to be read.

```php
/** AVOID THIS */
class Calc { 
 public function calcSumTwoNums() { /** */ }
}
```

We should always create classes that describe and represent the list concepts we need:

```php
/** DO THIS INSTEAD */
class Calculator { 
 public function calculateSumOfTwoNumbers() { /** */ }
}

// sum would be a good name for this method, just made an example to show problems with abbreviations.
```

**8. Keep all entities small**

Small classes tend to be focused on **doing just one thing**, improving single responsibility and the reusability and readability of that code. Use packages/namespaces to cluster related classes. Also packages should be small in order to have a clear purpose.

**9. No classes with more than 2 instance variables**

The more instance variables, the lower is the cohesion within the class. Classes with more than one parameters are usually orchestrators, those with only one are actuators.

```php
/** AVOID THIS */
class Example { 
 public function __construct(string $firstName, string $lastName, string $email, string $password) { /** ... */ }
}
```

We should always create classes that describe and represent the concepts we need:

```php
/** DO THIS INSTEAD */
class Example { 
 public function __construct(PersonalData $personalData, LoginData $loginData) { /** ... */ }
}
```

**10. All classes must have state**

No static methods should be used, avoid creating utility classes that collect some random behaviours together. Create classes with clear responsibility and a state to maintain. This will force you to create a network of collaborators that expose the required behaviours but hide their state.

```php
/** AVOID THIS */
class Utilities { 
 public static function log() { /** ... */ }
 public static function translate() { /** ... */ }
}
```

Always create objects that makes sense and represent some defined concept in the app:

```php
/** DO THIS INSTEAD */
class Logger { 
 public function log() { /** ... */ }
}

class Translator { 
 public function translate() { /** ... */ }
}
```
