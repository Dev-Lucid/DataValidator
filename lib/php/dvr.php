<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

global $__dvr;

class dvr
{
	public static function ruleset()
	{
		$ruleset = new dvr_ruleset();
		return $ruleset;
	}
	
	public static function rule()
	{
		$rule = new dvr_rule();
		return $rule;
	}
}

?>