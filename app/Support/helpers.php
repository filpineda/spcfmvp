<?php

if (! function_exists('customNumericFormat')) {

	function customNumericFormat($value) {
		return number_format($value, 2, ".", ",");
	}
}