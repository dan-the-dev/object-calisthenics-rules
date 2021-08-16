<?php

/** Rule 1 - Only one level of indentation per method */

/** 
 * You should only keep one level of indentation per method, avoiding the nest of commands; it helps to ensure that a method focuses on doing **only one thing** and reduce the size of methods, enabling easier reuse. This approach favors readability and simplicity, resulting in methods with a main line for their main responsibilities, ending in the last line of method, and some special cases handled in the path. A techniques to avoid levels of indentation is using guards to create an exit for special cases.
 * */

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
