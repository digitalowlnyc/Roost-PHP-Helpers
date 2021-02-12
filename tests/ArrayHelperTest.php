<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Tests;


use Roost\Helpers\Types\ArrayHelper;
use Roost\Testing\PHPUnit\Helpers\RoostTestCase;

class ArrayHelperTest extends RoostTestCase
{
	public function testGroupBy() {
		$array = [
			[
				"foo" => 1,
				"bar" => "a"
			],
			[
				"foo" => 2,
				"bar" => "b"
			],
			(object) [
				"foo" => 3,
				"bar" => "c"
			],
			(object) [
				"foo" => 4,
				"bar" => "d"
			],
			(object) [
				"foo" => 5,
				"bar" => "d"
			]
		];

		$this->assertEquals(
			array (
				'a' =>
					array (
						0 =>
							array (
								'foo' => 1,
								'bar' => 'a',
							),
					),
				'b' =>
					array (
						0 =>
							array (
								'foo' => 2,
								'bar' => 'b',
							),
					),
				'c' =>
					array (
						0 =>
							(object) array(
								'foo' => 3,
								'bar' => 'c',
							),
					),
				'd' =>
					array (
						0 =>
							(object) array(
								'foo' => 4,
								'bar' => 'd',
							),
						1 =>
							(object) array(
								'foo' => 5,
								'bar' => 'd',
							),
					),
			),
			$this->assertable(ArrayHelper::groupBy($array, "bar"))
		);
	}

	public function testKeyBy() {
		$array = [
			[
				"foo" => 1,
				"bar" => "a"
			],
			[
				"foo" => 2,
				"bar" => "b"
			],
			(object) [
				"foo" => 3,
				"bar" => "c"
			],
			(object) [
				"foo" => 4,
				"bar" => "d"
			],
			(object) [
				"foo" => 5,
				"bar" => "d"
			]
		];

		$this->expectExceptionWrapper(\RuntimeException::class, function() use($array) {
			ArrayHelper::keyBy($array, "bar");
		});

		unset($array[4]);

		$this->assertEquals(
			array (
				'a' =>
					array (
						'foo' => 1,
						'bar' => 'a',
					),
				'b' =>
					array (
						'foo' => 2,
						'bar' => 'b',
					),
				'c' =>
					(object) array(
						'foo' => 3,
						'bar' => 'c',
					),
				'd' =>
					(object) array(
						'foo' => 4,
						'bar' => 'd',
					),
			),
			$this->assertable(ArrayHelper::keyBy($array, "bar"))
		);
	}
}