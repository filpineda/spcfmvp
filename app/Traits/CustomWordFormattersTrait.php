<?php

namespace App\Traits;

trait CustomWordFormattersTrait
{
	public function CapitalizeNonPrepositionWords($words)
	{
		$prepositions = [
			'of',
			'in',
			'for',
			'to',
		];

		$strings = explode(" ", strtolower($words));
		foreach($strings as $key => $value) {
			if(! in_array($value, $prepositions)) {
				$strings[$key] = ucfirst($value);
			}
		}

		return implode(" ", $strings);
	}
}