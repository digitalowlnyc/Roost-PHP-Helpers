<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Roost\Helpers\Types;

class EnumHelper
{
	public static function value($val, array $options, $caseSensitive = false) {
		return static::compareEnum($val, $options, $caseSensitive, true);
	}

	public static function check($val, array $options, $caseSensitive = false) {
		return static::compareEnum($val, $options, $caseSensitive, false);
	}

	public static function compareEnum($val, array $options, $caseSensitive = false, $returnOriginalValue = false) {
		foreach($options as $option) {
			if(!$caseSensitive) {
				$equal = strcasecmp($option, $val);
			} else {
				$equal = strcmp($option, $val);
			}

			if($equal === 0) {
				if($returnOriginalValue) {
					return $val;
				} else {
					return $option;
				}
			}
		}

		return null;
	}
}
