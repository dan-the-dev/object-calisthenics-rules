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

![image info](./object_calisthenics_rules_infographic.pdf)
<object data="./object_calisthenics_rules_infographic.pdf" type="application/pdf" width="700px" height="700px">
    <embed src="./object_calisthenics_rules_infographic.pdf">
    </embed>
</object>

1. Only one level of indentation per method

    *You should only keep one level of indentation per method, avoiding the nest of commands; it helps to ensure that a method focuses on doing **only one thing** and reduce the size of methods, enabling easier reuse.* 

2. Don't use the "else" keyword

    *It promotes a **main execution line** with special cases handled. It suggest polimorphism to handle complex conditional cases, making the code more explicit. We can use NULL object pattern to express that a result has no value.*

3. Wrap all primitives and string

    *No arguments of public methods should be primitives, except constructors. Also no return value should be a primitive, for public methods. Instead of primitives, we must **create a class to describe the concept and contain its behaviours**.* 

4. First class collections

    *No arguments of public methods should be primitive collections (array, hash, tables, etc.). We must **create a class to handle that collection** and the behaviour of going throught its values.*

5. No getters/setters/properties 

    *We follow the original idea of OOP as a network of entities collaborating by passing messages each other. Don't ask data and then act on it; instead, **tell the object what you need it to do for you**. Data Structures and Objects have different responsibilities.* 

6. One dot per line

    *Avoid situations like `dog→body()→tail()→wag()` with a chain of calls, because that's strictly coupled with classes very far from the caller. **The caller here know only the Dog class and should talk only to it**, so for example we could have a method `dog→expressHappiness()` to encapsulate that behaviour.* 

7. Don't abbreviate

    ***Always make name explicit**, even if it cost a long name: no need to save characters. Abbreviations can only lead to misunderstanding and a code hard to be read.* 

8. Keep all entities small

    *Small classes tend to be focused on **doing just one thing**, improving single responsibility and the reusability and readability of that code. Use packages/namespaces to cluster related classes. Also packages should be small in order to have a clear purpose.* 

9. No classes with more than 2 instance variables

    ***The more instance variables, the lower is the cohesion within the class**. Classes with more than one parameters are usually orchestrators, those with only one are actuators.* 

10. All classes must have state

    No static methods should be used, avoid creating utility classes that collect some random behaviours together. Create classes with clear responsibility and a state to maintain. This will force you to create a network of collaborators that expose the required behaviours but hide their state.
