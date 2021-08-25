<?php

/** Rule 4 - First class collections */

/** 
 * No arguments of public methods should be primitive collections (array, hash, tables, etc.). We must **create a class to handle that collection** and the behaviour of going throught its values.
 * */

/** AVOID THIS */

class WrongLeague {
    public function newParticipants(array $newParticipantsList) {
        // do something
    }
}

/** DO THIS INSTEAD */
class CorrectLeague {
    public function newParticipants(Participants $newParticipants) {
        // do something
    }
}