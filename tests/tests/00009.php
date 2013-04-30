<?php
$field = dvr::field('field1')->rule('maxlength','fail_message',4);

$out  = '';
list($result,$errors) = $field->test(array('field1'=>'abc'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'abcd'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'abcde'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'abcdef'));
$out .= ($result)?'PASSES':'FAIL';

file_put_contents($output_path,$out);
?>