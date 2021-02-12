<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Tests;


use Roost\Helpers\Types\EnumHelper;
use Roost\Testing\PHPUnit\Helpers\RoostTestCase;

class EnumHelperTest extends RoostTestCase
{
	public function testValue() {
		$this->assertEquals(
			"bar",
			$this->assertable(EnumHelper::value("bar", ["foo", "BAR", "baz"]))
		);

		$this->assertEquals(
			"BAR",
			$this->assertable(EnumHelper::value("BAR", ["foo", "bar", "baz"]))
		);

		$this->assertEquals(
			null,
			$this->assertable(EnumHelper::value("BAR", ["foo", "bar", "baz"], true))
		);

		$this->assertEquals(
			null,
			$this->assertable(EnumHelper::value("", ["foo", "bar", "baz"], true))
		);
	}

	public function testCheck() {
		$this->assertEquals(
			"BAR",
			$this->assertable(EnumHelper::toEnum("bar", ["foo", "BAR", "baz"]))
		);

		$this->assertEquals(
			"bar",
			$this->assertable(EnumHelper::toEnum("BAR", ["foo", "bar", "baz"]))
		);

		$this->assertEquals(
			null,
			$this->assertable(EnumHelper::toEnum("BAR", ["foo", "bar", "baz"], true))
		);

		$this->assertEquals(
			null,
			$this->assertable(EnumHelper::toEnum("zaz", ["foo", "bar", "baz"], true))
		);
	}
}