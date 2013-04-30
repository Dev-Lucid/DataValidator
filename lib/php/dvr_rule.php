<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class dvr_rule
{
	public function __construct($type,$message,$data1,$data2,$data3)
	{
		$this->type = $type;
		$this->message = $message;
		$this->data1   = $data1;
		$this->data2   = $data2;
		$this->data3   = $data3;
	}
	
	public function test($value)
	{
		global $__dvr;
		switch($this->type)
		{
			case 'notnumeric':
				return (!is_numeric($value));
				break;
			case 'numeric':
				return (is_numeric($value));
				break;
			case 'checked':
				if(is_null($this->data1))
					$this->data1 = 'on';
				return ($value == $this->data1);
				break;
			case 'notchecked':
				if(is_null($this->data1))
					$this->data1 = 'on';
				return ($value != $this->data1);
				break;
			case 'email':
				return (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/",$value));
				break;
			case 'minlength':
				$value = trim($value);
				return (strlen($value) >= $this->data1);
				break;
			case 'maxlength':
				$value = trim($value);
				return (strlen($value) <= $this->data1);
				break;
			case 'length':
				$value = trim($value);
				if(!is_null($this->data2))
					return (strlen($value) >= $this->data1 && strlen($value) <= $this->data2);
				else
					return (strlen($value) >= $this->data1);
				break;
			case 'equals':
				return ($this->data1 == $value);
				break;
			case 'notequals':
				return ($this->data1 != $value);
				break;
			default: 
				throw new Exception('DVR: Unknown validation type: '.$this->type);
				break;
		}
	}
	
	function js()
	{
		return array(
			'type'=>$this->type,
			'message'=>$this->message,
			'data1'=>$this->data1,
			'data2'=>$this->data2,
			'data3'=>$this->data3
		);
	}
}

?>