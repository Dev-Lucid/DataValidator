<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

global $__dvr;
$__dvr=array(
	'log_hook'=>null,
);

class dvr
{
	function init($config = array())
	{
		global $__dvr;
		foreach($config as $key=>$value)
		{
			if(is_array($value))
			{
				foreach($value as $subkey=>$subvalue)
				{
					$__dvr[$key][$subkey] = $subvalue;
				}
			}
			else
				$__dvr[$key] = $value;
		}	
	}
	
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
	
	function log($string_to_log)
	{
		global $__dvr;
		if(!is_null($__dvr['log_hook']))
		{
			$__dvr['log_hook']('DVR: '.$string_to_log);
		}
	}
}

?>