<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Roost\Helpers\Types;

class ArrayHelper
{
	public static function groupBy(array $arr, $arrayKey, $allowDuplicates = true) {
		$result = [];

		foreach($arr as $item) {
			if(is_object($item)) {
				$key = $item->{$arrayKey};
			} else {
				$key = $item[$arrayKey];
			}

			if(array_key_exists($key, $result)) {
				$result[$key][] = $item;
			} else {
				$result[$key] = [$item];
			}
		}

		return $result;
	}

	public static function keyBy(array $arr, $arrayKey, $allowDuplicates = false) {
		$result = [];

		foreach($arr as $item) {
			if(is_object($item)) {
				$key = $item->{$arrayKey};
			} else {
				$key = $item[$arrayKey];
			}
			if(array_key_exists($key, $result) && !$allowDuplicates) {
				throw new \RuntimeException(sprintf("Duplicate key: '%s'", $key));
			} else {
				$result[$key] = $item;
			}
		}

		return $result;
	}

	public static function mapKeyValue(array $arr, $callback) {
		$result = [];

		foreach($arr as $item) {
			$keyValueArray = $callback($item);

			if(!array_key_exists("key", $keyValueArray) || !array_key_exists("value", $keyValueArray)) {
				throw new \RuntimeException("Callback must return an array with 'key' and 'value'.");
			}

			$result[$keyValueArray["key"]] = $keyValueArray["value"];
		}

		return $result;
	}
}
