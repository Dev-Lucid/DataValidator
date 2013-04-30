<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class dvr_field
{
	public function __construct($field)
	{
		$this->field = $field;
		$this->rules = array();
	}
		
	protected function __translate($text)
	{
		global $__dvr;
		return (isset($__dvr['hooks']['translator']) && $this->disable_translate !== true)?$__dvr['hooks']['translator']($text):$text;
	}
	
	public function rule($type,$message,$data1=null,$data2=null,$data3=null)
	{
		global $__dvr;
		$this->rules[] = new $__dvr['rule_class']($type,$message,$data1,$data2,$data3);
		return $this;
	}
	
	public function test($data)
	{
		$pass = true;
		$errors = array();
		foreach($this->rules as $rule)
		{
			if(!$rule->test($data[$this->field]))
			{
				$pass = false;
				$errors[] = $this->__translate($rule->message);
			}
		}
		return array($pass,$errors);
	}
}

?>