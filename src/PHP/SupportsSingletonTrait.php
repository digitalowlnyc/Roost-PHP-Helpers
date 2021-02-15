<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Roost\Helpers\PHP;


trait SupportsSingletonTrait
{
	private static $singleton = null;

	public static function use() {
		if(static::$singleton === null) {
			static::$singleton = new static();
		}

		return static::$singleton;
	}
}