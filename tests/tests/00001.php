<?php
$field = dvr::field('field1')->rule('equals','fail_message','must_equal_value');

$out  = '';
list($result,$errors) = $field->test(array('field1'=>'fail_value'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'must_equal_value'));
$out .= ($result)?'PASSES':'FAIL';

file_put_contents($output_path,$out);
?>