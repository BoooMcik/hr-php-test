<?php 

require 'IntegerCalc.php';

class FactorialCalc extends IntegerCalc {
	public function divide($a, $b)  {
		if (!(int) $b) {
			throw new Exception("Division by zero");
			echo ("aaa");
		} 
		return $a / $b;
}

	public function factorial($a) {
		if ($a == 1 || $a == 0) {
			return 1;
		} else {
			$fc = new FactorialCalc();
			return $fc->factorial($a - 1) * $a;
		}
	}
}
