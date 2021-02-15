<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Roost\Helpers\Types;


use Roost\Helpers\PHP\SupportsSingletonTrait;

class StringHelper
{
	use SupportsSingletonTrait;

	/**
	 * @param $str
	 * @param $callable
	 * @param string $delimiter
	 * @return string
	 */
	public function applyToLines($str, callable $callable, $delimiter = PHP_EOL) {
		$lines = explode($delimiter, $str);

		foreach($lines as &$line) {
			$line = $callable($line);
		}

		return implode($delimiter, $lines);
	}
}