<?php

	class Validation 
	{

		public function checkLength($str, $length = 2) {
			return strlen($str) >= $length; 
		}

		public function checkIfRegExp($str, $reg) {
			return preg_match(); 
		}

		public function checkNumber($number, $maxNumber, $minNumber) {
			return ($minNumber <= $number) && ($number <= $maxNumber); 
		}

	}