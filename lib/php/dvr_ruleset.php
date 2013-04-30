<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class dvr_ruleset
{
	public function __construct($fields)
	{
		$this->fields = $fields;
	}
	
	function test($data)
	{
		$pass = true;
		$errors = array();
		foreach($this->fields as $field)
		{
			list($field_result,$field_errors) = $field->test($data);
			if(!$field_result)
			{
				$pass = false;
				$errors = array_merge($errors,$field_errors);
			}
		}
		return array($pass,$errors);
	}
	
	function js($form_name)
	{
		$return = array();
		foreach($this->fields as $field)
		{
			$return[] = $field->js();
		}
		return 'dvr.rulesets[\''.addslashes($form_name).'\'] = '.json_encode($return).';';
	}
}

?>