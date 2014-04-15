<?php

abstract class IntegerCalc {

	abstract protected function divide($a,$b);

	public function add($a,$b) {
		$this->validateInput($a,$b);
		return $a + $b;
	}

	public function substract($a, $b) {
		$this->validateInput($a,$b);
		return $a - $b;
	}

	public function multiply($a, $b) {
		$this->validateInput($a,$b);
		return $a * $b;
	}


	private function validateInput($a, $b = null) {
		if ($a !== (int) $a || $b !== (int) $b) {
			throw Exception("Input data should be integers only");
		}
	}
} 
