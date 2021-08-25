<?php

/** Rule 10 - All classes must have state */

/** 
 * No static methods should be used, avoid creating utility classes that collect some random behaviours together. Create classes with clear responsibility and a state to maintain. This will force you to create a network of collaborators that expose the required behaviours but hide their state.
 * */

/** AVOID THIS */

class Utilities { 
    public static function log() { /** ... */ }
    public static function translate() { /** ... */ }
}

/** DO THIS INSTEAD */
class Logger { 
    public function log() { /** ... */ }
}

class Translator { 
    public function translate() { /** ... */ }
}