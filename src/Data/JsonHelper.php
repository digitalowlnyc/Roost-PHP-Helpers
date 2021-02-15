<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Roost\Helpers\Data;


use Roost\Helpers\PHP\SupportsSingletonTrait;

class JsonHelper
{
	use SupportsSingletonTrait;

	private $encodeOptions = "";

	public function encode($val) {
		$encoded = json_encode($val, static::getEncodeOptions());

		if($encoded === false) {
			throw new \RuntimeException("Could not encode value");
		}

		return $encoded;
	}

	public function setEncodeOptions($encodeOptions) {
		$this->encodeOptions = $encodeOptions;
	}

	private function getEncodeOptions() {
		if($this->encodeOptions === null) {
			$this->encodeOptions = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES;
		};

		return $this->encodeOptions;
	}
}