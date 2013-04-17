<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

global $__dvr;
$__dvr=array(
	'hooks'=>array(),
);

class dvr
{
	function log($to_write)
	{
		global $__dvr;
		if(isset($__dvr['hooks']['log']))
		{
			$to_write=(is_object($to_write) || is_array($to_write))?print_r($to_write,true):$to_write;
			$__dvr['hooks']['log']('DVR: '.$to_write);
		}
	}
	
	function call_hook($hook,$p0=null,$p1=null,$p2=null,$p3=null,$p4=null,$p5=null,$p6=null)
	{
		global $__dvr;
		if(isset($__dvr['hooks'][$hook]))
			$__dvr['hooks'][$hook]($p0,$p1,$p2,$p3,$p4,$p5,$p6);
	}
	
	function init($config = array())
	{
		global $__dvr;
		foreach($config as $key=>$value)
		{
			if(is_array($value))
			{
				foreach($value as $subkey=>$subvalue)
				{
					if(is_numeric($subkey))
						$__dvr[$key][] = $subvalue;
					else
						$__dvr[$key][$subkey] = $subvalue;
				}

			}
			else
				$__dvr[$key] = $value;
		}	
	}
		
	public static function deinit()
	{
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
}

?>