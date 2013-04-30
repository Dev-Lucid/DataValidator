<?php
$ruleset = dvr::ruleset(
	dvr::field('field1')->rule('equals','fail_message','must_equal_value'),
	dvr::field('field2')->rule('minlength','fail_message',5),
	dvr::field('field3')->rule('maxlength','fail_message',4),
	dvr::field('field4')->rule('checked','fail_message')
);

$test_set = array(
	array('field1'=>'does_not_equal','field2'=>'test','field3'=>'test1234','field4'=>''),
	array('field1'=>'must_equal_value','field2'=>'test123','field3'=>'test1234','field4'=>''),
	array('field1'=>'must_equal_value','field2'=>'test123','field3'=>'test','field4'=>''),
	array('field1'=>'must_equal_value','field2'=>'test123','field3'=>'test','field4'=>'on'),
);
$out  = '';
list($result,$errors) = $ruleset->test($test_set[0]);
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $ruleset->test($test_set[1]);
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $ruleset->test($test_set[2]);
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $ruleset->test($test_set[3]);
$out .= ($result)?'PASSES':'FAIL';

file_put_contents($output_path,$out);
?>