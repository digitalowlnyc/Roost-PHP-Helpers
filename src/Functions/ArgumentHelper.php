<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Roost\Helpers\Functions;

use Roost\Helpers\Types\EnumHelper;

class ArgumentHelper
{
	public static function enum($argumentName, $val, array $options, $caseSensitive = false, $returnOriginalValue = false) {
		$parsedValue = EnumHelper::compareEnum($val, $options, $caseSensitive, $returnOriginalValue);

		if($parsedValue === null) {
			throw new \InvalidArgumentException(sprintf("Argument '%s' value '%s' is not valid, must be one of: %s", $argumentName, $val, implode(", ", $options)));
		}

		return $parsedValue;
	}
}