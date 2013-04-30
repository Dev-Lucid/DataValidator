<?php
$field = dvr::field('field1')->rule('email','fail_message');

$out  = '';
list($result,$errors) = $field->test(array('field1'=>'test@test.com'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'test@test'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'@test.com'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'testtest.com'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'test@@test.com'));
$out .= ($result)?'PASSES':'FAIL';

file_put_contents($output_path,$out);
?>